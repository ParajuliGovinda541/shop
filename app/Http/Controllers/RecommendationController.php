<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function recentlyAdded()
    {
        $recentlyAddedProducts = Product::take(5)('id', 'desc')->orderBy->get();

        return view('/', compact('recentlyAddedProducts'));
    }


   }
