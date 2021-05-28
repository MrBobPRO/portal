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
Route::post('/setLangTj', 'LanguageController@setLangTj');
//--------------Language-change's routes--------------


//--------------Toolbar routes-------------------
Route::get('/ideas/create', 'IdeaController@create')->name('ideas.create');
Route::post('/ideas/store', 'IdeaController@store');

Route::get('/complaints/create', 'ComplaintController@create')->name('complaints.create');
Route::post('/complaints/store', 'ComplaintController@store');
Route::post('/complaints/download', 'ComplaintController@download');
Route::post('/complaints/response', 'ComplaintController@response');

Route::get('/questionnaire', 'QuestionnaireController@index')->name('questionnaire.index');
Route::get('/questionnaire/{id}', 'QuestionnaireController@single')->name('questionnaire.single');
Route::post('/options/like', 'OptionController@like');
Route::post('/options/remove_like', 'OptionController@remove_like');

Route::get('/notifications', 'NotificationController@index')->name('notifications.index');
Route::get('/notifications/{id}', 'NotificationController@single')->name('notifications.single');
//--------------Toolbar routes-------------------


//------------Structure page's route--------------
Route::get('/structure', 'StructureController@index')->name('structure.index');
//------------Structure-page's route--------------


//------------News-page's route--------------
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/{id}', 'NewsController@single')->name('news.single');
   //News-page categories' routes
   Route::get('/inner_news', 'NewsController@inner')->name('news.inner');
   Route::get('/global_news', 'NewsController@global')->name('news.global');
      //Like and dislike routes
      Route::post('/like', 'GradeController@like');
      Route::post('/dislike', 'GradeController@dislike');
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
Route::post('/books/download', 'KnowledgeController@books_download');
//------------Knowledge-page's route--------------
 

//-----------------Dashboard routes-------------------
//Profile-page's route
Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard.profile.index');
Route::post('/update_avatar', 'ProfileController@update_avatar');
Route::post('/update_profile', 'ProfileController@update_profile');
Route::post('/update_password', 'ProfileController@update_password');
Route::post('/update_employee_profile', 'ProfileController@update_employee_profile');
//Settings-page's routes
Route::get('/dashboard/settings', 'SettingsController@index')->name('dashboard.settings.index');
Route::post('/update_color', 'SettingsController@changeColor');
Route::post('/update_background', 'SettingsController@changeBackground');
Route::post('/update_dashbg', 'SettingsController@update_dashbg');
//Users page`s routes
Route::get('/dashboard/users', 'UsersController@index')->name('dashboard.users.index');
Route::get('/dashboard/users/{id}', 'UsersController@single')->name('dashboard.users.single');
//Ideas
Route::get('/dashboard/ideas', 'IdeaController@index')->name('dashboard.ideas.index');
Route::get('/dashboard/ideas/{id}', 'IdeaController@single')->name('dashboard.ideas.single');
      //Comment
      Route::post('/ideas/comment', 'CommentController@ideas');

//Dashboard visibility change
Route::post('/store_dashboard_visibility', 'HomeController@store_dashboard_visibility');

      //-----------Admins routes start-------------
      //Simditor upload photo route
      Route::post('/upload/simditor_photo', 'AdminController@upload_simditor_photo');
      //Dropzone upload photo route
      Route::post('/upload/dropzone_photo', 'AdminController@upload_dropzone_photo');
      //Ads
      Route::get('/dashboard/ads', 'AdminController@ads')->name('dashboard.ads.index');
      Route::get('/dashboard/ads_create', 'AdminController@ads_create')->name('dashboard.ads.create');
      Route::get('/dashboard/ads/{id}', 'AdminController@ads_single')->name('dashboard.ads.single');
      Route::post('/update_ads', 'AdsController@update');
      Route::post('/store_ads', 'AdsController@store');
      Route::post('/remove_ads', 'AdsController@remove');
      //Questionnaire
      Route::get('/dashboard/questionnaire', 'AdminController@questionnaire')->name('dashboard.questionnaire.index');
      Route::get('/dashboard/questionnaire_create', 'AdminController@questionnaire_create')->name('dashboard.questionnaire.create');
      Route::get('/dashboard/questionnaire/{id}', 'AdminController@questionnaire_single')->name('dashboard.questionnaire.single');
      Route::post('/update_questionnaire', 'QuestionnaireController@update');
      Route::post('/store_questionnaire', 'QuestionnaireController@store');
      Route::post('/remove_questionnaire', 'QuestionnaireController@remove');
      //News
      Route::get('/dashboard/news', 'AdminController@news')->name('dashboard.news.index');
      Route::get('/dashboard/news_create', 'AdminController@news_create')->name('dashboard.news.create');
      Route::get('/dashboard/news/{id}', 'AdminController@news_single')->name('dashboard.news.single');
      Route::post('/update_news', 'NewsController@update');
      Route::post('/store_news', 'NewsController@store');
      Route::post('/remove_news', 'NewsController@remove');
      //Slider
      Route::get('/dashboard/slider', 'AdminController@slider')->name('dashboard.slider.index');
      Route::get('/dashboard/slider_create', 'AdminController@slider_create')->name('dashboard.slider.create');
      Route::get('/dashboard/slider/{id}', 'AdminController@slider_single')->name('dashboard.slider.single');
      Route::post('/update_slider_item', 'SliderController@update_item');
      Route::post('/store_slider_item', 'SliderController@store_item');
      Route::post('/remove_slider_item', 'SliderController@remove_item');
      //Complaints
      Route::get('/dashboard/complaints', 'AdminController@complaints')->name('dashboard.complaints.index');
      Route::get('/dashboard/complaints/{id}', 'AdminController@complaints_single')->name('dashboard.complaints.single');
      //Videos
      Route::get('/dashboard/videos', 'AdminController@videos')->name('dashboard.videos.index');
      Route::get('/dashboard/videos_create', 'AdminController@videos_create')->name('dashboard.videos.create');
      Route::get('/dashboard/videos/{id}', 'AdminController@videos_single')->name('dashboard.videos.single');
      Route::post('/update_video', 'EntertainmentController@videos_update');
      Route::post('/store_video', 'EntertainmentController@videos_store');
      Route::post('/remove_video', 'EntertainmentController@videos_remove');
      Route::post('/entertainmet/check_uploading_video_size', 'EntertainmentController@check_uploading_video_size');
      //Projects
      Route::get('/dashboard/projects', 'AdminController@projects')->name('dashboard.projects.index');
      Route::get('/dashboard/projects_create', 'AdminController@projects_create')->name('dashboard.projects.create');
      Route::get('/dashboard/projects/{id}', 'AdminController@projects_single')->name('dashboard.projects.single');
      Route::post('/update_projects', 'ProjectsController@update');
      Route::post('/store_projects', 'ProjectsController@store');
      Route::post('/remove_projects', 'ProjectsController@remove');
      //Galleries
      Route::get('/dashboard/galleries', 'AdminController@galleries')->name('dashboard.galleries.index');
      Route::get('/dashboard/galleries_create', 'AdminController@galleries_create')->name('dashboard.galleries.create');
      Route::get('/dashboard/galleries/{id}', 'AdminController@galleries_single')->name('dashboard.galleries.single');
      Route::post('/update_galleries', 'EntertainmentController@galleries_update');
      Route::post('/store_galleries', 'EntertainmentController@galleries_store');
      Route::post('/delete_gallery_image', 'EntertainmentController@delete_gallery_image');

      //Knowledge
      Route::get('/dashboard/knowledge', 'AdminController@knowledge')->name('dashboard.knowledge.index');
      
      //-----------Admins routes end-------------
//-----------------Dashboard routes-------------------



require __DIR__.'/auth.php';
 