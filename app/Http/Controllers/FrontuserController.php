<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontuserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function about()
    {
        return view('user.about');
    }

}   

