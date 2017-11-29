<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/meetings', ['as' => 'meetings',
    'uses' => 'MeetingController@index']);
Route::get('/meetings/create', ['as' => 'meetings.create',
    'uses' => 'MeetingController@create']);
Route::post('/meetings/create', 'MeetingController@create_post');
Route::get('/meetings/accept/{id}', ['as' => 'meetings.accept',
    'uses' => 'MeetingController@accept']);
Route::get('/meetings/detail/{id}', ['as' => 'meetings.detail',
    'uses' => 'MeetingController@detail']);
Route::get('/meetings/delete/{id}', ['as' => 'meetings.delete',
    'uses' => 'MeetingController@delete']);

Route::get('/login', ['as' => 'login', 'uses' => 'UserController@showLogin']);
Route::post('/login', 'UserController@doLogin');
