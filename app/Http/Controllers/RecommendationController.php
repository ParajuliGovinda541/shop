<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function recentlyAdded()
    {
        $recentlyAddedProducts = Product::take(5)('id', 'desc')->orderBy->get();

        return view('/', compact('recentlyAddedProducts'));
    }
}
