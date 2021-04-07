<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RussianController extends Controller
{
    public function index() 
    {
        return view('knowledge.russian.index');
    }
}
