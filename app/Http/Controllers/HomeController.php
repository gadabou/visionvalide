<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        $categories = Category::withCount('products')->latest('id')->get();
        $products = Product::with(['category:id,name', 'tags:id,name'])
            ->inRandomOrder()
            ->limit(8)
            ->latest('id')
            ->get();
        $sliders = Slider::inRandomOrder()->limit(5)->latest('id')->get();

        return view('dashboard', compact('products', 'categories', 'sliders'));
    }

    public function products(Request $request)
    {
        $categories = Category::withCount('products')->latest('id')->get();
        $products = Product::with(['category:id,name', 'tags:id,name'])
            ->inRandomOrder()
            ->latest()
            ->paginate(12);

        return view('shop', compact('products', 'categories'));
    }

    public function productDetail(Product $product)
    {
        // $categories = Category::withCount('products')->latest('id')->get();
        $otherProducts = Product::with(['category:id,name', 'tags:id,name'])
            ->inRandomOrder()
            ->limit(8)
            ->latest('id')
            ->get();
        return view('product-detail', compact('product', 'otherProducts'));
    }

    public function categoryDetail(Category $category)
    {
        $products = Product::with(['tags:id,name'])
            ->where('category_id', $category->id)
            ->latest('id')
            ->paginate(12);
        return view('category-product', compact('category', 'products'));
    }

    public function newsletter(Request $request){
        $newsletter = new Newsletter;
        $validation = Validator::make($request->input(), [
            'email' => ['required', 'email',]
        ]);
        $fields = $validation->validate();

        if ($validation->fails()) {
            return back()->withErrors(['error', "Erreur"])->withInput();
        }

        $newsletter->email = $fields['email'];
        $newsletter->save();
        return back()->with('success', 'Merci pour votre inscription');
    }
}
