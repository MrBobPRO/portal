<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index() 
    {
        $user = Auth::user();

        return view('dashboard.settings.index', compact('user'));
    }

    public function changeColor(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        $user->colorScheme = $request->colorscheme;
        $user->save();
        
        return redirect('/dashboard/settings'); 
    }

    public function changeBackground(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        $user->dashBg = $request->dashbg;
        if ($request->darkbg == 'on') {
            $user->darkMode = true;
        } else {
            $user->darkMode = false;
        }
        $user->save();
        
        return redirect('/dashboard/settings');        
    }

}
