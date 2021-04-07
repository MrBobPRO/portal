<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PGSController extends Controller
{
    public function index() 
    {
        return view('knowledge.pgs.index');
    }
}
