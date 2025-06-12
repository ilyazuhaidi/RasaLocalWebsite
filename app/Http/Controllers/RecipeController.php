<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function create()
    {
        return view('RecipeModule.addRecipe');
    }

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
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Recipe submitted successfully!');
    }

    public function myRecipes()
    {
        $recipes = Recipe::where('user_id', Auth::id())->latest()->get();
        return view('RecipeModule.myRecipe', compact('recipes'));
    }

    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('RecipeModule.editRecipe', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $recipe = Recipe::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        if ($request->hasFile('image')) {
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

    public function destroy($id)
    {
        $recipe = Recipe::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        if ($recipe->image_path) {
            Storage::disk('public')->delete($recipe->image_path);
        }

        $recipe->delete();

        return redirect()->route('recipes.my')->with('success', 'Recipe deleted successfully.');
    }

    public function showByCategory($category)
    {
        $recipes = Recipe::where('category', $category)->latest()->get();
        return view('RecipeModule.categoryRecipe', compact('recipes', 'category'));
    }

    public function show($id)
    {
        $recipe = Recipe::with('user')->findOrFail($id);
        return view('RecipeModule.recipeDetails', compact('recipe'));
    }
}
