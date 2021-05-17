<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home.index');

Route::post('/send_credentials', 'HomeController@send_credentials');

//-----------------Chat routes----------------------
Route::post('/chat/push', 'ChatController@push');
Route::post('/chat/update', 'ChatController@update');
Route::post('/chat/load_older_msgs', 'ChatController@load_older_msgs');
//Chat visibility change
Route::post('/store_chat_visibility', 'ChatController@store_visibility');
//-----------------Chat routes----------------------


//--------------forgot password routes-------------------
Route::get('/forgot_password', 'AuthController@forgotPassword')->name('login.forgot_password');
Route::post('/forgot_password', 'AuthController@checkEmail');

Route::get('/reset_password', 'AuthController@resetPassword')->name('login.reset_password');
Route::post('/reset_password', 'AuthController@resetPasswordPost');
//--------------forgot password routes---------------


//--------------Language-change's routes--------------
Route::post('/setLangRu', 'LanguageController@setLangRu');
Route::post('/setLangEn', 'LanguageController@setLangEn');
Route::post('/setLangTj', 'LanguageController@setLangTj');
//--------------Language-change's routes--------------


//--------------Ideas complaints & notification routes-------------------
Route::get('/ideas/create', 'IdeaController@create')->name('ideas.create');
Route::post('/ideas/store', 'IdeaController@store');
Route::post('/ideas/download', 'IdeaController@download');
Route::post('/ideas/response', 'IdeaController@response');

Route::get('/complaints/create', 'ComplaintController@create')->name('complaints.create');
Route::post('/complaints/store', 'ComplaintController@store');
Route::post('/complaints/download', 'ComplaintController@download');
Route::post('/complaints/response', 'ComplaintController@response');

Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
Route::get('/notifications/{id}', 'NotificationController@single')->name('notifications.single');
//--------------Ideas complaints & notification routes-------------------


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
Route::get('/entertainment/videos', 'EntertainmentController@videos')->name('entertainment.videos.index');
Route::get('/entertainment/gallery', 'EntertainmentController@gallery')->name('entertainment.gallery.index');
Route::get('/entertainment/gallery/{id}', 'EntertainmentController@gallery_single')->name('entertainment.gallery.single');

//------------Entertainment-page's route--------------


//------------Project page's route--------------
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/{id}', 'ProjectsController@single')->name('projects.single');
Route::get('/projects_completed', 'ProjectsController@completed')->name('projects.completed');
Route::get('/projects_ongoing', 'ProjectsController@ongoing')->name('projects.ongoing');

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
      //Simditor upload photo route
      Route::post('/upload/simditor_photo', 'AdminController@upload_simditor_photo');
      //News
      Route::get('/dashboard/news', 'AdminController@news')->name('dashboard.news.index');
      Route::get('/dashboard/news_create', 'AdminController@news_create')->name('dashboard.news.create');
      Route::get('/dashboard/news/{id}', 'AdminController@news_single')->name('dashboard.news.single');
      Route::post('/update_news', 'NewsController@update');
      Route::post('/store_news', 'NewsController@store');
      //Ideas
      Route::get('/dashboard/ideas', 'AdminController@ideas')->name('dashboard.ideas.index');
      Route::get('/dashboard/ideas/{id}', 'AdminController@ideas_single')->name('dashboard.ideas.single');
      //Complaints
      Route::get('/dashboard/complaints', 'AdminController@complaints')->name('dashboard.complaints.index');
      Route::get('/dashboard/complaints/{id}', 'AdminController@complaints_single')->name('dashboard.complaints.single');
      //Videos
      Route::get('/dashboard/videos', 'AdminController@videos')->name('dashboard.videos.index');
      Route::get('/dashboard/videos_create', 'AdminController@videos_create')->name('dashboard.videos.create');
      Route::get('/dashboard/videos/{id}', 'AdminController@videos_single')->name('dashboard.videos.single');
      Route::post('/update_video', 'EntertainmentController@videos_update');
      Route::post('/store_video', 'EntertainmentController@videos_store');
      Route::post('/entertainmet/check_uploading_video_size', 'EntertainmentController@check_uploading_video_size');
      //-----------Admins routes end-------------
//-----------------Dashboard routes-------------------



require __DIR__.'/auth.php';
 