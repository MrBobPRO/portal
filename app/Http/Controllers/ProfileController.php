<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $user = Auth::user();
        // get needed column from app locale
        $name = App::currentLocale() . 'Name';
        
        $languages = DB::table('languages')
                ->select('languages.id', 'languages.' . $name . ' as name')
                ->orderBy($name, 'asc')
                ->get();

        return view('dashboard.profile.index', compact('user', 'languages'));
    }

    public function update_avatar(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $file = $request->file('avatar');

        if($file) 
        {
            if($user->avatar != 'default.png') {
                unlink(public_path('img/users/' . $user->avatar));
            }
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/users/original'), $fileName);
            
            //Create new img from original
            $img = Image::make(public_path('img/users/original/' . $fileName));
            $height = $img->height();
            $width = $img->width();

            //make same images height and width
            if($width < $height) {
                $img->fit($width, $width, function ($constraint) {
                    $constraint->upsize();
                }, 'center');
            }

            else {
                $img->fit($height, $height, function ($constraint) {
                    $constraint->upsize();
                }, 'center');
            }

            //resize image if images width > 500px
            $newWidth = $img->width();
            if($newWidth > 500) {
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            //save img
            $img->save(public_path('img/users/' . $fileName));
            // delete original img
            unlink(public_path('img/users/original/' . $fileName));

            $user->avatar = $fileName;
            $user->save();
        }

        return redirect()->back();
    }
    
    public function update_profile(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        //Validation start
        if ($request->nickname != $user->nickname) {
            $request->validate([
                'nickname' => 'unique:users',
            ]);
        } else if ($request->email != $user->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
        }//Validation end 
        //Edit user start
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->save();//Edit user end

        //Detach languages and attach new ones
        $user->languages()->detach();
        if ($request->languages) 
        {
            foreach ($request->languages as $lang) 
            {       
                $user->languages()->attach($lang);
            }
        }
            
        return redirect()->back();
            
    }

    public function update_password(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->password, $user->password)) {
            if ($request->newPassword == $request->confirmPassword) {
                $user->password = bcrypt($request->newPassword);
                $user->save();
                return 'success';
            }
            return 'newPasswordDoesntMatch';
        }
        return 'passwordNotMatched';
    }

}
