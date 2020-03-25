<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function about()
    {
        $var1 = 317;
        $arrayVar = ["CIT", 3, 1, 7];

        return view('about', compact('var1', 'arrayVar'));
    }
    public function contact()
    {
        return view('contact');
    }
}
