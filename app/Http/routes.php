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



Route::get('/product/{slug}',['uses'=>'IndexController@show','as'=>'slug'])->where('slug','[\w-]+');
Route::get('/catalog',['uses'=>'IndexController@index','as'=>'cat']);




