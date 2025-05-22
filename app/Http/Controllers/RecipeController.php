<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    // Show the Add Recipe form
    public function create()
    {
        return view('RecipeModule.addRecipe');
    }

    // Store the new recipe
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('recipes', 'public');

        Recipe::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Recipe submitted successfully!');
    }

    // Show current user's recipes
    public function myRecipes()
    {
        $recipes = Recipe::where('user_id', auth()->id())->latest()->get();
        return view('RecipeModule.myRecipes', compact('recipes'));
    }

    // Show the Edit Recipe form
    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        return view('RecipeModule.editRecipe', compact('recipe'));
    }

    // Update the recipe
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $recipe = Recipe::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        if ($request->hasFile('image')) {
            // Optional: delete old image
            if ($recipe->image_path) {
                Storage::disk('public')->delete($recipe->image_path);
            }
            $recipe->image_path = $request->file('image')->store('recipes', 'public');
        }

        $recipe->title = $request->title;
        $recipe->category = $request->category;
        $recipe->description = $request->description;
        $recipe->save();

        return redirect()->route('recipes.my')->with('success', 'Recipe updated successfully.');
    }

    // Delete the recipe
    public function destroy($id)
    {
        $recipe = Recipe::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        if ($recipe->image_path) {
            Storage::disk('public')->delete($recipe->image_path);
        }

        $recipe->delete();

        return redirect()->route('recipes.my')->with('success', 'Recipe deleted successfully.');
    }
}
