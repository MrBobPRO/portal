<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Language change routes
Route::post('/setLangRu', 'LanguageController@setLangRu');
Route::post('/setLangEn', 'LanguageController@setLangEn');

Route::get('/', 'HomeController@index');

require __DIR__.'/auth.php';
