<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/main-recipe', function () {
    return view('RecipeModule.mainRecipe');
});

Route::get('add-recipe', [RecipeController::class, 'create'])->name('RecipeModule.addRecipe');
Route::post('add-recipe', [RecipeController::class, 'store'])->name('RecipeModule.addRecipe');