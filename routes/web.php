<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [HomeController::class, 'index'])->name('home');

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
