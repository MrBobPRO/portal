<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\DB;

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
        
        return redirect()->back(); 
    }

    public function changeBackground(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        if($request->custom_img) {
            $temp_path = public_path('img/dashboards/temp/' . $request->dashbg);
            $original_path = public_path('img/dashboards/' . $request->dashbg);
            copy($temp_path, $original_path);
            $user->dashBg = $request->dashbg;

        } 
        else {
            $user->dashBg = $request->dashbg;
        }

        if ($request->darkbg == 'on') {
            $user->darkMode = true;
        } else {
            $user->darkMode = false;
        }
        $user->save();
        
        return redirect()->back();        
    }

    public function update_dashbg(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $file = $request->file('dashbg');

        if($file) 
        {
            $fileName = $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/dashboards/temp'), $fileName);
            
            //Create new img from original
            $img = Image::make(public_path('img/dashboards/temp/' . $fileName));
            //save img
            $img->save(public_path('img/dashboards/temp/' . $fileName));

            return $fileName;
        }

    }

}
