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
//ABOUT COMPANY PAGE
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
//PROJECTS AND INITIATIVE PAGE
Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/projects/{project}', 'ProjectsController@show')->name('projects.show');

//KNOWLEDGE CENTER PAGE
Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge');
Route::get('/knowledge/books/{book}', 'KnowledgeController@books')->name('knowledge.books');
//KNOWLEDGE CENTER CATEGORIES
   //English page
   Route::get('/english', 'EnglishController@index')->name('english');
      Route::get('/english/beginner', 'EnglishController@beginner')->name('english.beginner');
      Route::get('/english/intermediate', 'EnglishController@intermediate')->name('english.intermediate');
      Route::get('/english/upperintermediate', 'EnglishController@upperintermediate')->name('english.upperintermediate');
      Route::get('/english/expert', 'EnglishController@expert')->name('english.expert');
      Route::get('/english/mastery', 'EnglishController@mastery')->name('english.mastery');
   //Russian page
   Route::get('/russian', 'RussianController@index')->name('russian');
   //Business page
   Route::get('/business', 'BusinessController@index')->name('business');
   //Energetics page
   Route::get('/energetics', 'EnergeticsController@index')->name('energetics');
   //PGS page
   Route::get('/pgs', 'PGSController@index')->name('pgs');
   //IT_Programms page
   Route::get('/itprog', 'ITProgsController@index')->name('itprog');




require __DIR__.'/auth.php';
