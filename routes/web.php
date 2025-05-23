<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/main-recipe', function () {
    return view('RecipeModule.mainRecipe');
});

// Show the form
Route::get('add-recipe', [RecipeController::class, 'create'])->name('recipes.create');

// Handle form submission
Route::post('add-recipe', [RecipeController::class, 'store'])->name('recipes.store');

//My Recipes Page
Route::get('my-recipes', [RecipeController::class, 'myRecipes'])->name('recipes.my');
Route::get('recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');








// Routes for Review and Rating Module
    
// Show review form
Route::get('/review', [ReviewController::class, 'create'])->name('reviews.create');

// Submit a review
Route::post('/review', [ReviewController::class, 'store'])->name('reviews.store');

// Show all reviews
Route::get('/reviews', [ReviewController::class, 'show'])->name('reviews.show');

// Report a review
Route::post('/review/{review}/report', [ReviewController::class, 'report'])->name('reviews.report');


