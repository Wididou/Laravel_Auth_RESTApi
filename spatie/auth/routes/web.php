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

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/create', 'UserController@store')->name('user.store');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('/user/delete/{id}', 'UserController@delete')->name('user.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin', 
    'namespace'=>'Admin', 
    'middleware' => ['auth', 'admin']],
    function(){
        Route::get('dashbord','DashbordController@index')->name('dashbord');
    });

Route::group([
    'as' => 'qhse.',
    'prefix' => 'quality', 
    'namespace'=>'QHSE', 
    'middleware' => ['auth', 'qhse']],
    function(){
        Route::get('dashbord','DashbordController@index')->name('dashbord');
    });


