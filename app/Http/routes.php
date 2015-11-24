<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Controller for links which are only html and not a sub-section of the site
 */
Route::get('/', 'HtmlController@index');
Route::get('/offline', 'HtmlController@offlineProjects');
Route::get('/ai', 'HtmlController@ai');
Route::get('/construction', 'HtmlController@construction');

/**
 *	Controller for the blog section of the site.
 */
Route::resource('/blog', 'PostsController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    ]);

/**
 * Controller for the tools section of the site.
 */
Route::get('/tools', 'ToolsController@index');
Route::get('/tools/musiclearning', 'ToolsController@construction');
Route::get('/tools/video', 'ToolsController@construction');
Route::get('/tools/filedownload', 'ToolsController@construction');
Route::get('/tools/chat', 'ToolsController@construction');
Route::get('/tools/youtube', 'ToolsController@construction');
Route::get('/tools/pdf', 'ToolsController@construction');

/**
 * Controller for the Links section of the site.
 */
Route::get('/links', 'LinksController@index');
Route::get('/links/teamspeak', 'LinksController@ts'); 
