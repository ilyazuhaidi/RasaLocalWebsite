<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recipe;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show the review submission form
    public function create()
    {
        $recipes = Recipe::all(); // User must choose which recipe to review
        return view('Review_and_Rating_Module.submit_review_form', compact('recipes'));
    }

    // Store a submitted review
    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::updateOrCreate(
            ['user_id' => auth()->id(), 'recipe_id' => $request->recipe_id],
            ['rating' => $request->rating, 'comment' => strip_tags($request->comment)]
        );

        return back()->with('success', 'Review submitted.');
    }

    // Show all reviews
    public function show()
    {
        $reviews = Review::with(['user', 'recipe'])->latest()->get();
        return view('Review_and_Rating_Module.show_review', compact('reviews'));
    }

    // Report a specific review
    public function report($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_flagged' => true]);

        return back()->with('success', 'Review reported.');
    }
}
