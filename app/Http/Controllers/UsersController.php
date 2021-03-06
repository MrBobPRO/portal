<?php

namespace App\Http\Controllers;

use App\Mail\SendCredentials;
use App\Models\Choice;
use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Grade;
use App\Models\Idea;
use App\Models\Notification;
use App\Models\User;
use App\Models\Viewed;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['store', 'update', 'remove']);
    }

    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
                    
        return view('dashboard.users.index', compact('users'));
    }

    public function single($id)
    {
        $user = User::find($id);
        
        return view('dashboard.users.single', compact('user'));
    }

    public function store(Request $request)
    {
        $user = new User;

        //Validation
        $request->validate([
            'email' => 'unique:users',
            'login_id' => 'unique:users'
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->avatar = 'default.png';
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->login_id = $request->login_id;
        $user->password = bcrypt($request->login_id);
        $user->description = 'Коротко о себе...';
        $user->department_id = $request->department_id;
        $user->position_id = $request->position_id;
        $user->designation_id = $request->designation_id;
        $user->save();
                
        //send email credentials
        \Mail::to($request->email)->send(new SendCredentials($request->email, $request->login_id));

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $user = User::find($request->id);
        // delete user's avatar
        if ($user->avatar != 'default.png') {
            $path = public_path('img/users/' . $user->avatar);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // delete users languages from db
        $user->languages()->detach();

        $user->delete();
        
        //delete all users data from database tables
        $user_id = $request->id;
        Choice::where('user_id', $user_id)->delete();
        Comment::where('user_id', $user_id)->delete();
        Complaint::where('user_id', $user_id)->delete();
        Grade::where('user_id', $user_id)->delete();
        Idea::where('user_id', $user_id)->delete();
        Notification::where('user_id', $user_id)->delete();
        Viewed::where('user_id', $user_id)->delete();

        return redirect()->route('dashboard.structure.index');
    }

    public function update(Request $request) 
    {
        //Find emloyee by id
        $user = User::find($request->user_id);
        //Validation start
        if ($request->login_id != $user->login_id) {
            $request->validate([
                'login_id' => 'unique:users'
            ]);
        }
        
        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
        } 
        //Validation end 

        //Edit user start
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->birth_date = $request->birth_date;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->login_id = $request->login_id;
        $user->role = $request->role;
        $user->department_id = $request->department_id;
        $user->designation_id = $request->designation_id;
        $user->position_id = $request->position_id;
        $user->description = $request->description;
        $user->save();
        
        //Detach languages and attach new ones
        $user->languages()->detach();
        if ($request->languages) 
        {
            foreach ($request->languages as $lang) 
            {       
                $user->languages()->attach($lang);
            }
        } 

        //Detach projects and attach new ones
        $user->projects()->detach();
        if ($request->projects) 
        {
            foreach ($request->projects as $pr) 
            {       
                $user->projects()->attach($pr);
            }
        }

        return redirect()->back();
            
    }

}
