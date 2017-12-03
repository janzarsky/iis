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

Route::group(['middleware' => 'auth'], function () {
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

    Route::get('/patrons', ['as' => 'patrons',
        'uses' => 'PatronController@index']);
    Route::get('/patrons/remove', ['as' => 'patrons.remove',
        'uses' => 'PatronController@remove']);
    Route::get('/patrons/cancel', ['as' => 'patrons.cancel',
        'uses' => 'PatronController@cancel']);
    Route::get('/patrons/request', ['as' => 'patrons.request',
        'uses' => 'PatronController@request']);
    Route::post('/patrons/request', 'PatronController@request_post');
    Route::get('/patrons/stop', ['as' => 'patrons.stop',
        'uses' => 'PatronController@stop']);
    Route::get('/patrons/accept/{$id}', ['as' => 'patrons.accept',
        'uses' => 'PatronController@accept']);

    Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
});

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', ['as' => 'admin',
        'uses' => 'AdminController@index']);
    Route::get('/admin/detail/{id}', ['as' => 'admin.detail',
        'uses' => 'AdminController@detail']);
    Route::get('/admin/edit/{id}', ['as' => 'admin.edit',
        'uses' => 'AdminController@edit']);
    Route::post('/admin/edit', 'AdminController@edit_post');
    Route::get('/admin/delete/{id}', ['as' => 'admin.delete',
        'uses' => 'AdminController@delete']);
    Route::get('/admin/create', ['as' => 'admin.create',
        'uses' => 'AdminController@create']);
    Route::post('/admin/create', 'AdminController@create_post');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function() { return redirect('/login'); });

    Route::get('/login', ['as' => 'login', 'uses' => 'UserController@showLogin']);
    Route::post('/login', 'UserController@doLogin');
});
