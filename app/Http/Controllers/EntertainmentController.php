<?php

namespace App\Http\Controllers;

use App\Models\Entertainment;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function index()
    {
        $videos = Entertainment::latest()->paginate(16);

        return view('entertainment.index', compact('videos'));
    }
}
