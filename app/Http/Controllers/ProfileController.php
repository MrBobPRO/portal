<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller

{
    public function index() 
    {
        $user = Auth::user();
        $languages = Language::all();

        return view('dashboard.profile.index', compact('user', 'languages'));
    }

    public function update_avatar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($request->hasFile('avatar')) 
        {
            $fileName = $user->id . '.' . $request->file('avatar')->getClientOriginalExtension();
            
            $request->file('avatar')->move(public_path('img/users'), $fileName);
            
            $user->avatar = $fileName;
            $user->save();
        }

        return redirect()->back();
    }
    
    public function update_profile(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->save();

        //detach languages and attach new ones
        $user->languages()->detach();
        foreach ($request->languages as $lang) 
        {
            $user->languages()->attach($lang);
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
