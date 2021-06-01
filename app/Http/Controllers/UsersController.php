<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Position;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
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

}
