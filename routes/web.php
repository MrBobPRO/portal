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

Route::post('/login', 'HomeController@login');

Route::get('/', 'HomeController@index')->name('home');
//ABOUT COMPANY
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/about/aboutus', 'AboutController@aboutus')->name('about.aboutus');
Route::get('/about/structure', 'AboutController@structure')->name('about.structure');
Route::get('/about/leadership', 'AboutController@leadership')->name('about.leadership');
//NEWS PAGE
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/companynews', 'NewsController@companynews')->name('news.companynews');
Route::get('/news/worldnews', 'NewsController@worldnews')->name('news.worldnews');
Route::get('/news/{news}', 'NewsController@show')->name('news.show');
//ENTERTAINMENT PAGE
Route::get('/entertainment', 'EntertainmentController@index')->name('entertainment');
//PROJECTS AND INITIATIVE
Route::get('/projects', 'ProjectsController@index')->name('projects');
//KNOWLEDGE CENTER
Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge');


Route::get('/videos', 'HomeController@videos');

require __DIR__.'/auth.php';
