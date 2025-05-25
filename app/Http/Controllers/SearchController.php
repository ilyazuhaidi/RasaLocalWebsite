<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $recipes = Recipe::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('title', 'like', "%{$query}%")
                         ->orWhere('category', 'like', "%{$query}%")
                         ->orWhere('description', 'like', "%{$query}%");
        })->get();

        return view('Search_and_Filter_Module.search_recipe', compact('recipes', 'query'));
    }
}
