<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home.index');

Route::post('/send_credentials', 'HomeController@send_credentials');

//--------------forgot password routes-------------------
Route::get('/forgot_password', 'AuthController@forgotPassword')->name('login.forgot_password');
Route::post('/forgot_password', 'AuthController@checkEmail');

Route::get('/reset_password', 'AuthController@resetPassword')->name('login.reset_password');
Route::post('/reset_password', 'AuthController@resetPasswordPost');
//--------------forgot password routes---------------


//--------------Language-change's routes--------------
Route::post('/setLangRu', 'LanguageController@setLangRu');
Route::post('/setLangEn', 'LanguageController@setLangEn');
//--------------Language-change's routes--------------


//------------About-page's route--------------
Route::get('/about', 'AboutController@index')->name('about.index');
   //About-page categories' routes
   Route::get('/about/whoweare', 'AboutController@whoweare')->name('about.whoweare');
   Route::get('/about/structure', 'AboutController@structure')->name('about.structure');
   Route::get('/about/leadership', 'AboutController@leadership')->name('about.leadership');
//------------About-page's route--------------


//------------News-page's route--------------
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/{news}', 'NewsController@single')->name('news.single');
   //News-page categories' routes
   Route::get('/inner_news', 'NewsController@inner')->name('news.inner');
   Route::get('/global_news', 'NewsController@global')->name('news.global');
//------------News-page's route--------------


//------------Entertainment-page's route--------------
Route::get('/entertainment', 'EntertainmentController@index')->name('entertainment.index');
//------------News-page's route--------------


//------------News-page's route--------------
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/{project}', 'ProjectsController@showproject')->name('projects.showproject');
//------------Pojects-page's route--------------


//------------Knowledge-page's route--------------
Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge.index');
Route::get('/knowledge/books/{material}', 'KnowledgeController@books')->name('knowledge.books.index');
Route::get('/knowledge/book/{book}', 'KnowledgeController@showbook')->name('knowledge.books.showbook');
Route::get('/knowledge/videos/{material}', 'KnowledgeController@videos')->name('knowledge.videos.index');
//------------Knowledge-page's route--------------
 

require __DIR__.'/auth.php';
 