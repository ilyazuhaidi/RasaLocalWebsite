<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $recipeId) {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        Review::updateOrCreate(
            ['user_id' => auth()->id(), 'recipe_id' => $recipeId],
            ['rating' => $request->rating, 'comment' => strip_tags($request->comment)]
        );

        return back()->with('success', 'Review submitted.');
    }

    public function report($id) {
        $review = Review::findOrFail($id);
        $review->update(['is_flagged' => true]);

        return back()->with('success', 'Review reported.');
    }

}
