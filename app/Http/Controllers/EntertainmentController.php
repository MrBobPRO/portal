<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
class EntertainmentController extends Controller
{
    public function index()
    {   
        $videos = Video::paginate(16);

        return view('entertainment.index', compact('videos'));
    }
}
