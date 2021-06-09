<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function update(Request $request)
    {
        $department = Department::find($request->id);
        
        $department->name = $request->name;
        $department->priority = $request->priority;
        $department->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $users = User::where('department_id', $request->id)->get();

        //change all users department with current department into unselected
        if ($users) 
        {
            foreach ($users as $user) {
                $user->department_id = 1;
                $user->save();
            }
        }

        Department::find($request->id)->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $department = new Department();
        
        $department->name = $request->name;
        $department->priority = $request->priority;
        $department->save();

        return redirect()->back();
    }
}
