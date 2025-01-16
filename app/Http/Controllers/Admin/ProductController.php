<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::with('category')->latest('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::latest('id')->get(['id', 'name']),
            'tags' => Tag::latest('id')->get(['id', 'name']),
        ]);
    }

    public function store(ProductRequest $request)
    {
        // La dimension des images doivent normalement etre 500x500
        $code = generateCode('PROD', Product::max('id'));
        $main_image_path = null;
        if ($request->hasFile('main_image_path')) {
            $main_image_path = Storage::disk('public')->put("product_images/$code", $request->main_image_path);
        }

        $data = array_merge($request->validated(), [
            'code' => $code,
            'main_image_path' => $main_image_path,
            'created_by' => Auth::id(),
        ]);

        $product = Product::create($data);
        $product->tags()->sync($request->tags);

        $path = null;
        if ($request->images) {
            foreach ($request->images as $key => $value) {
                $path = Storage::disk('public')->put("product_images/$code", $value['path']);
                $product->images()->create(['path' => $path]);
            }
        }

        return to_route('admin.products.index')->with(notify(config('flash-message.store_message'), 'success'));
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::latest('id')->get(['id', 'name']),
            'tags' => Tag::latest('id')->get(['id', 'name']),
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('main_image_path')) {
            if ($product->main_image_path) {
                Storage::disk('public')->delete($product->main_image_path);
            }
            $main_image_path = Storage::disk('public')->put("product_images/$product->code", $request->main_image_path);
            $data['main_image_path'] = $main_image_path;
        }

        $product->update($data);
        $product->tags()->sync($request->tags);

        if ($request->images) {
            foreach ($request->images as $key => $image) {
                $path = Storage::disk('public')->put("product_images/$product->code", $image['path']);
                $imgRecord = $product->images()->where('id', $key)->first();

                if ($imgRecord) {
                    Storage::disk('public')->delete($imgRecord->path);
                    $imgRecord->update(['path' => $path]);
                } else {
                    $product->images()->create(['path' => $path]);
                }
            }
        }

        return to_route('admin.products.index')->with(notify(config('flash-message.update_message'), 'info'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->deleteDirectory("product_images/$product->code");

        // if ($product->main_image_path) {
        //     Storage::disk('public')->delete($product->main_image_path);
        // }

        // foreach ($product->images as $image) {
        //     Storage::disk('public')->delete($image->path);
        // }
        $product->delete();

        return to_route('admin.products.index')->with(notify(config('flash-message.destroy_message'), 'danger'));
    }
}
