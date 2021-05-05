<?php

namespace App\Http\Controllers;

use App\Models\Entertainment;
use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function index()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.index', compact('videos'));
    }

    public function videos()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.videos.index', compact('videos'));
    }

    public function gallery() 
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('entertainment.gallery.index', compact('galleries'));
    }

    public function gallery_single($id) 
    {
        $gallery = Gallery::find($id);

        return view('entertainment.gallery.single', compact('gallery'));
    }
}
