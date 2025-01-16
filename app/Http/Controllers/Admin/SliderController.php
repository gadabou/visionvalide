<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest('id')->get();

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // La dimension des images doivent normalement etre 1000x430
        $image_path = null;
        if ($request->hasFile('image_path')) {
            $image_path = Storage::disk('public')->put('sliders', $request->image_path);
        }

        $data = array_merge($request->validated(), [
            'image_path' => $image_path,
            'created_by' => Auth::id(),
        ]);

        Slider::create($data);
        return back()->with(notify(config('flash-message.store_message'), 'success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('admin.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        if ($request->hasFile('image_path')) {
            if ($slider->image_path) {
                Storage::disk('public')->delete($slider->image_path);
            }
            $image_path = Storage::disk('public')->put("sliders", $request->image_path);
            $data['image_path'] = $image_path;
        }
        $slider->update($data);

        return to_route("admin.sliders.index")->with(notify(config('flash-message.update_message'), 'info'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image_path) {
            Storage::disk('public')->delete($slider->image_path);
        }
        $slider->delete();

        return back()->with(notify(config('flash-message.destroy_message'), 'danger'));
    }
}
