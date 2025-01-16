<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Publicity;
use App\Models\Slider;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function dashboard(){
        $category_count = Category::count();
        $product_count = Product::count();
        $image_count = Image::count();
        $slider_count = Slider::count();
        $tag_count = Tag::count();
        $publicity_count = Publicity::count();

        return view('admin.dashboard', [
            'category_count' => Category::count(),
            'product_count' => Product::count(),
            'image_count' => Image::count(),
            'slider_count' => Slider::count(),
            'tag_count' => Tag::count(),
            'publicity_count' => Publicity::count(),
        ]);
    }
}
