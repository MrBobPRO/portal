<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function update(Request $request)
    {
        $position = Position::find($request->id);
        
        $position->name = $request->name;
        $position->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $users = User::where('position_id', $request->id)->get();

        //change users positions with current position into unselected
        if ($users) 
        {
            foreach ($users as $user) {
                $user->position_id = 1;
                $user->save();
            }
        }

        Position::find($request->id)->delete();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $position = new Position;
        
        $position->name = $request->name;
        $position->save();

        return redirect()->back();
    }
}
