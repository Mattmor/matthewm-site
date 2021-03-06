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
Route::resource('blog', 'PostsController');

/**
 *	Controller for the Roles section of the site.
 */
Route::patch('roles/user/link/{id}', 'RolesController@linkUser');
Route::patch('roles/user/{id}', 'RolesController@unlinkUser');
Route::resource('roles', 'RolesController');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

/**
 * Controller for the tools section of the site.
 */
Route::get('/tools', 'ToolsController@index');
Route::get('/tools/youtube', 'ToolsController@showYoutube');
Route::post('/tools/youtube', 'ToolsController@downloadYoutube');
Route::get('/tools/htmltotext', 'ToolsController@showHtmlToTextPage');
Route::post('/tools/htmltotext', 'ToolsController@showHtmlToText');
Route::get('/tools/musiclearning', 'ToolsController@construction');
Route::get('/tools/video', 'ToolsController@construction');
Route::get('/tools/filedownload', 'ToolsController@construction');
Route::get('/tools/chat', 'ToolsController@construction');
Route::get('/tools/pdf', 'ToolsController@construction');

/**
 * Controller for the Links section of the site.
 */
Route::get('/links', 'LinksController@index');
Route::get('/links/teamspeak', 'LinksController@ts');

/**
 * Controller for the front end portfolio section of the site.
 */
Route::get('/portfolio/jason', 'PortfolioController@jason');
