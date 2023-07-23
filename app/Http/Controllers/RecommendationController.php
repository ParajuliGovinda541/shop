<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function recentlyAdded()
    {
        $recentlyAddedProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('user.recommendation', compact('recentlyAddedProducts'));
    }
}
