<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publicity;
use App\Http\Requests\PublicityRequest;

class PublicityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicities = Publicity::latest('id')->get();

        return view('admin.publicity.index', compact('publicities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publicity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicityRequest $request)
    {
        $publicity = Publicity::create($request->validated());

        return to_route('admin.publicities.index')->with(notify(config('flash-message.store_message'), 'success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicity $publicity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicity $publicity)
    {
        return view('admin.publicity.edit', compact('publicity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicityRequest $request, Publicity $publicity)
    {
        $publicity->update($request->validated());

        return to_route('admin.publicities.index')->with(notify(config('flash-message.update_message'), 'info'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicity $publicity)
    {
        $publicity->delete();

        return back()->with(notify(config('flash-message.destroy_message'), 'danger'));
    }
}
