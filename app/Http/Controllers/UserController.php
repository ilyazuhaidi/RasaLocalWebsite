<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\SavedRecipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recipes = Recipe::where('user_id', $user->id)->get();
        $saved = SavedRecipe::where('user_id', $user->id)->with('recipe')->get();

        return view('Module 1.userprofile', compact('user', 'recipes', 'saved'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function saveRecipe($id)
    {
        SavedRecipe::firstOrCreate([
            'user_id' => Auth::id(),
            'recipe_id' => $id,
        ]);

        return back()->with('success', 'Recipe saved!');
    }

    public function unsaveRecipe($id)
    {
        SavedRecipe::where('user_id', Auth::id())
            ->where('recipe_id', $id)
            ->delete();

        return back()->with('success', 'Recipe unsaved!');
    }

    public function showSavedRecipes()
    {
        $user = auth()->user();

        // Eager load saved recipes for the user
        $savedRecipes = $user->savedRecipes()->paginate(10);

        return view('Module 1.saved', compact('savedRecipes'));

    }
}
