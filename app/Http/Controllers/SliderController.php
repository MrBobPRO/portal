<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function update_item(Request $request)
    {
        $item = Slider::find($request->id);

        $item->title = $request->title;
        $item->url = $request->url;
        $item->priority = $request->priority;
        $item->color = $request->color;
        $item->save();

        //change image
        $file = $request->file('image');

        if($file) 
        {
            // delete previous poster
            $path = public_path('img/slider/' . $item->image);
            if (file_exists($path)) {
                unlink($path);
            }

            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/slider'), $fileName);

            $item->image = $fileName;
            $item->save();
        }

        return redirect()->back();
    }

    public function store_item(Request $request)
    {
        $item = Slider::create([
            'title' => $request->title,
            'url' => $request->url,
            'priority' => $request->priority,
            'color' => $request->color,
            'image' => 'image'
        ]);

        $file = $request->file('image');

        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img/slider'), $fileName);

        $item->image = $fileName;
        $item->save();

        return redirect()->route('dashboard.slider.index');
    }
    
    public function remove_item(Request $request)
    {
        $slider = Slider::find($request->id);
        // delete image
        $path = public_path('img/slider/' . $slider->image);
        if (file_exists($path)) {
            unlink($path);
        }
        // delete slider_table from db
        $slider->delete();

        return redirect()->route('dashboard.slider.index');
    }

}
