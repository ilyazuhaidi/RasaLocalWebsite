<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->latest()->take(6)->get(); // latest 6 reviews
        return view('home', compact('reviews'));
    }
}

