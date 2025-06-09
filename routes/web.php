<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//home
//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});

/* Laravel UI Authentication Routes */
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('Module 1.userprofile');
    })->name('profile');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::get('/profile/edit', function () {
        $user = Auth::user();
        return view('Module 1.editprofile', compact('user'));
    })->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    Route::post('/recipes/{id}/save', [UserController::class, 'saveRecipe'])->name('recipes.save');
    Route::delete('/recipes/{id}/unsave', [UserController::class, 'unsaveRecipe'])->name('recipes.unsave');

    Route::get('/saved-recipes', [UserController::class, 'showSavedRecipes'])->name('recipes.saved');
});

//Logout
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Save Recipe
Route::middleware('auth')->post('/recipes/{recipe}/save', [RecipeController::class, 'toggleSave'])->name('recipes.save');


//Recipe Module
Route::get('/main-recipe', function () {
    return view('RecipeModule.mainRecipe');
});
// Show the add recipe
Route::get('add-recipe', [RecipeController::class, 'create'])->name('recipes.create');
// Handle form submission
Route::post('add-recipe', [RecipeController::class, 'store'])->name('recipes.store');
//My Recipes Page
Route::get('my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');
Route::get('recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
//CategoryRecipes
Route::get('/recipes/category/{category}', [RecipeController::class, 'showByCategory'])->name('recipes.byCategory');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');









// Routes for Review and Rating Module
Route::get('/review', [ReviewController::class, 'create'])->name('reviews.create'); // Show review form
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store'); // Submit a review
Route::get('/reviews', [ReviewController::class, 'show'])->name('reviews.show'); // Show all reviews
Route::post('/review/{review}/report', [ReviewController::class, 'report'])->name('reviews.report'); // Report a review





//Routes for Searching and Filtering Module
use App\Http\Controllers\SearchController;

Route::get('/search-recipes', [SearchController::class, 'index'])->name('recipes.search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
