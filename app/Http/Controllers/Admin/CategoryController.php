<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->withCount('products')->latest('id')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
                // La dimension des images doivent normalement etre 150x150

        $image_path = null;
        if ($request->hasFile('image_path')) {
            $image_path = Storage::disk('public')->put("category_images", $request->image_path);
        }

        $data = array_merge($request->validated(), [
            'code' => generateCode("PROD", Category::max('id')),
            'created_by' => Auth::id(),
            'image_path' => $image_path,
        ]);
        Category::create($data);

        return back()->with(notify(config('flash-message.store_message'), 'success'));
    }

    public function show(Category $category)
    {
        $category = Category::where('id', $category->id)->with('products')->latest('id')->first();
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image_path')) {
            if ($category->image_path) {
                Storage::disk('public')->delete($category->image_path);
            }
            $image_path = Storage::disk('public')->put("category_images", $request->image_path);
            $data['image_path'] = $image_path;
        }
        $category->update($data);

        return to_route("admin.categories.index")->with(notify(config('flash-message.update_message'), 'info'));
    }

    public function destroy(Category $category)
    {
        if ($category->image_path) {
            Storage::disk('public')->delete($category->image_path);
        }
        $category->delete();

        return back()->with(notify(config('flash-message.destroy_message'), 'danger'));
    }
}
