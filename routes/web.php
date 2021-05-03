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
Route::get('/news/{id}', 'NewsController@single')->name('news.single');
   //News-page categories' routes
   Route::get('/inner_news', 'NewsController@inner')->name('news.inner');
   Route::get('/global_news', 'NewsController@global')->name('news.global');
      //Like and dislike routes
      Route::post('/news/like', 'GradeController@like');
      Route::post('/news/dislike', 'GradeController@dislike');
      //Comment
      Route::post('/news/comment', 'CommentController@news');
//------------News-page's route--------------


//------------Entertainment-page's route--------------
Route::get('/entertainment', 'EntertainmentController@index')->name('entertainment.index');
//------------Entertainment-page's route--------------


//------------Project page's route--------------
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/{id}', 'ProjectsController@single')->name('projects.single');

Route::post('/projects/comment', 'CommentController@projects');
//------------Poject page's route--------------


//------------Knowledge-page's route--------------
Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge.index');
Route::get('/knowledge/books/{material}', 'KnowledgeController@books')->name('knowledge.books.index');
Route::get('/read_book_{book}', 'KnowledgeController@books_single')->name('knowledge.books.single');
Route::get('/knowledge/videos/{id}', 'KnowledgeController@videos')->name('knowledge.videos.index');
//------------Knowledge-page's route--------------
 

//-----------------Dashboard routes-------------------
//Profile-page's route
Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard.profile.index');
Route::post('/update_avatar', 'ProfileController@update_avatar');
Route::post('/update_profile', 'ProfileController@update_profile');
Route::post('/update_password', 'ProfileController@update_password');
//Settings-page's routes
Route::get('/dashboard/settings', 'SettingsController@index')->name('dashboard.settings.index');
Route::post('/update_color', 'SettingsController@changeColor');
Route::post('/update_background', 'SettingsController@changeBackground');
//Users page`s routes
Route::get('/dashboard/users', 'UsersController@index')->name('dashboard.users.index');
Route::get('/dashboard/users/{id}', 'UsersController@single')->name('dashboard.users.single');

//Dashboard visibility change
Route::post('/store_dashboard_visibility', 'HomeController@store_dashboard_visibility');

      //-----------Admins routes start-------------
      Route::get('/dashboard/news', 'AdminController@news')->name('dashboard.news.index');
      Route::get('/dashboard/news/{id}', 'AdminController@news_single')->name('dashboard.news.single');
      //-----------Admins routes end-------------
//-----------------Dashboard routes-------------------

require __DIR__.'/auth.php';
 