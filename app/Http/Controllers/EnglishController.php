<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnglishController extends Controller
{
    public function index() 
    {
        return view('knowledge.english.index');
    }
    public function beginner() 
    {
        return view('knowledge.english.beginner');
    }
    public function intermediate() 
    {
        return view('knowledge.english.intermediate');
    }
    public function upperintermediate() 
    {
        return view('knowledge.english.upperintermediate');
    }
    public function expert() 
    {
        return view('knowledge.english.expert');
    }
    public function mastery() 
    {
        return view('knowledge.english.mastery');
    }
}
