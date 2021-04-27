<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index() 
    {
        $user = Auth::user();

        $languages = Language::get();

        return view('profile.index', compact('user', 'languages'));
    }

    public function editProfile(Request $request) 
    {
        $user = User::find(Auth::user()->id);

        if($request->hasFile('avatar')) 
        {
            $fileName = $user->id . '.' . $request->file('avatar')->getClientOriginalExtension();
            
            $request->file('avatar')->move(public_path('img/users'), $fileName);
            
            $user->avatar = $fileName;
            $user->save();
        }
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->nickname = $request->nickname;
            $user->birth_date = $request->birth_date;
            $user->email = $request->email;
            $user->description = $request->description;
            $user->save();

            Language::where('user_id', $user->id)->delete();
            
            foreach ($request->languages as $lang) 
            {
                $language = new Language;
                $language->user_id = $user->id;
                $language->name = $lang;
                $language->save();
            }
            

        return redirect('/profile');

 
    }
}
