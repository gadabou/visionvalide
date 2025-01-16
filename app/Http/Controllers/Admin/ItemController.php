<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Item::paginate(10);
        return view('admin.items', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        // $rules = [ "name" => "required", "stocks.*" => "required" ];

        // foreach($request->stocks as $key => $value) {
        //     $rules["stocks.{$key}.quantity"] = 'required';
        //     $rules["stocks.{$key}.price"] = 'required';
        // }

        // $request->validate($rules);

        if (!$request->stocks) {
            return redirect()->back()->with(['error' => "At least on item is required"])->withInput();
        }

        $product = Item::create(["name" => $request->name]);
        foreach($request->stocks as $key => $value) {
            $product->stocks()->create($value);
        }

        return redirect()->back()->with(['success' => 'Product created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
