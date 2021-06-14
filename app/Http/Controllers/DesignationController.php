<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function update(Request $request)
    {
        $designation = Designation::find($request->id);
        
        $designation->name = $request->name;
        $designation->priority = $request->priority;
        $designation->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $users = User::where('designation_id', $request->id)->get();

        //change all users designation with current designation into unselected
        if ($users) 
        {
            foreach ($users as $user) {
                $user->designation_id = 1;
                $user->save();
            }
        }

        Designation::find($request->id)->delete();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $designation = new Designation;
        
        $designation->name = $request->name;
        $designation->priority = $request->priority;
        $designation->save();

        return redirect()->back();
    }
}
