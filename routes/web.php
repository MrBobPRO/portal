<?php

use Illuminate\Support\Facades\Route;

//Language-change's routes
   Route::post('/setLangRu', 'LanguageController@setLangRu');
   Route::post('/setLangEn', 'LanguageController@setLangEn');

//Login-page's route
   Route::post('/login', 'HomeController@login');

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
   Route::get('/knowledge/books/{book}', 'KnowledgeController@showbook')->name('knowledge.showbook');//Route for showing book by id
      //Knowledge-page categories' routes
         //English-page's route
            Route::get('/english', 'EnglishController@index')->name('english.index');
               //English-page categories' routes
                  Route::get('/english/beginner', 'EnglishController@beginner')->name('english.beginner');
                  Route::get('/english/intermediate', 'EnglishController@intermediate')->name('english.intermediate');
                  Route::get('/english/upperintermediate', 'EnglishController@upperintermediate')->name('english.upperintermediate');
                  Route::get('/english/expert', 'EnglishController@expert')->name('english.expert');
                  Route::get('/english/mastery', 'EnglishController@mastery')->name('english.mastery');
         //Russian-page's route
            Route::get('/russian', 'RussianController@index')->name('russian.index');
         //Business-page's route
            Route::get('/business', 'BusinessController@index')->name('business.index');
         //Energy-page's route
            Route::get('/energy', 'EnergyController@index')->name('energy.index');
         //PGS-page's route
            Route::get('/pgs', 'PGSController@index')->name('pgs.index');
         //ITPrograms-page's route
            Route::get('/itprog', 'ITProgController@index')->name('itprog.index');

require __DIR__.'/auth.php';
