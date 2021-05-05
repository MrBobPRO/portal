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
        $galleries = Gallery::paginate(6);

        return view('entertainment.gallery.index', compact('galleries'));
    }

    public function galleryShow(Gallery $gallery) 
    {
        $images = Image::paginate(9);

        return view('entertainment.gallery.show', compact('gallery', 'images'));
    }
}
