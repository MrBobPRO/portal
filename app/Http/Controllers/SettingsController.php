<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $user = Auth::user();

        return view('dashboard.settings.index', compact('user'));
    }

    public function updateColor(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        $user->colorScheme = $request->colorscheme;
        $user->save();
        
        return redirect()->back(); 
    }

    public function update_background_temporarily(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('background');

        if($file) 
        {
            $fileName = $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/dashboards/temp'), $fileName);

            return $fileName;
        }

    }

    public function update_background(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        //Move temp image from temp folder if its custom image
        if($request->custom_img) {
            $temp_path = public_path('img/dashboards/temp/' . $request->background);
            $original_path = public_path('img/dashboards/' . $request->background);
            rename($temp_path, $original_path);
            $user->dashBg = $request->background;
        } 
        //else if its one of the background templates
        else {
            $user->dashBg = $request->background;
        }

        //check dark or light mode
        if ($request->darkbg == 'on') 
            $user->darkMode = true;
        else 
            $user->darkMode = false;
        
        $user->save();
        
        return redirect()->back();        
    }

}
