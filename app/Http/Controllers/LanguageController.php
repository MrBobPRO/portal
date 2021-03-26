<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    
    public function setLangEn()
    {
        session([
            'my_locale' => 'en'
        ]);

        return redirect()->back();
    }

    public function setLangRu()
    {
        session([
            'my_locale' => 'ru'
        ]);

        return redirect()->back();
    }

}
