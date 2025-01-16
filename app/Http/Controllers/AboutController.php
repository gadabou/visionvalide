<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        dd('ici');
        $categories = Category::withCount('products')->latest('id')->get();
        return view('about', compact("categories"));
    }
}
