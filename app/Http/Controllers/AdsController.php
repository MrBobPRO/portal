<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function update(Request $request)
    {
        $ad = Ads::find($request->id);
        $ad->text = $request->text;

        $ad->save();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        Ads::create([
            'text' => $request->text
        ]);

        return redirect()->route('dashboard.ads.index');
    }
    
    public function remove(Request $request)
    {
        Ads::find($request->id)->delete();

        return redirect()->route('dashboard.ads.index');
    }

}
