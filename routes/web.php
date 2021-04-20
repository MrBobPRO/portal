<?php

use Illuminate\Support\Facades\Route;

//Language-change's routes
   Route::post('/setLangRu', 'LanguageController@setLangRu');
   Route::post('/setLangEn', 'LanguageController@setLangEn');

   Route::post('/send_credentials', 'HomeController@send_credentials');

//Home-page's route
   Route::get('/', 'HomeController@index')->name('home.index');

//About-page's route
   Route::get('/about', 'AboutController@index')->name('about.index');
      //About-page categories' routes
         Route::get('/about/aboutus', 'AboutController@aboutus')->name('about.aboutus');
         Route::get('/about/structure', 'AboutController@structure')->name('about.structure');
         Route::get('/about/leadership', 'AboutController@leadership')->name('about.leadership');

//News-page's routes
   Route::get('/news', 'NewsController@index')->name('news.index');
   Route::get('/news/{news}', 'NewsController@shownews')->name('news.shownews');
      //News-page categories' routes
         Route::get('/companynews', 'NewsController@companynews')->name('news.companynews');
         Route::get('/worldnews', 'NewsController@worldnews')->name('news.worldnews');

//Entertainment-page's route
   Route::get('/entertainment', 'EntertainmentController@index')->name('entertainment.index');

//Pojects-page's routes
   Route::get('/projects', 'ProjectsController@index')->name('projects.index');
   Route::get('/projects/{project}', 'ProjectsController@showproject')->name('projects.showproject');

//Knowledge-page's route
   Route::get('/knowledge', 'KnowledgeController@index')->name('knowledge.index');
   Route::get('/knowledge/books/{material}', 'KnowledgeController@books')->name('knowledge.books.index');
   Route::get('/knowledge/book/{book}', 'KnowledgeController@showbook')->name('knowledge.books.showbook');
   Route::get('/knowledge/videos/{material}', 'KnowledgeController@videos')->name('knowledge.videos.index');
 
require __DIR__.'/auth.php';
 