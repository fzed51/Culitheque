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
/*
  Route::get('/', ['as' => 'index', 'uses' => 'WelcomeController@index']);

  Route::get('home', 'HomeController@index');

  Route::get('apropos', ['as' => 'about', 'uses' => 'PageController@about']);

  Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
  ]);
 */

Route::Get('/', function() {
	Return "index";
});

Route::Get('page', function() {
	Return "page";
});
