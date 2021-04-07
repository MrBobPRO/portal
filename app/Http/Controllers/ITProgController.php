<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITProgController extends Controller
{
    public function index() 
    {
        return view('knowledge.itprog.index');
    }
}
