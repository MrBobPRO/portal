<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function index()
    {   
        return view('about.index');
    }

    public function whoweare() 
    {
        return view('about.whoweare');
    }

    public function structure() 
    {
        return view('about.structure');
    }

    public function leadership() 
    {
        return view('about.leadership');
    }
    
}
