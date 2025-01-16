<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->latest('id')->get();
        $products = Product::with(['category:id,name', 'tags:id,name'])->latest()->inRandomOrder()->limit(8)->get();

        return view('shope', compact('products', 'categories'));
    }
}
