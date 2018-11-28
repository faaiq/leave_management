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

/*Route::get('/', function () {
    return view('login');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'UsersController');
Route::post('/users', 'UsersController');
Route::get('/users/add', 'UsersController@add');
Route::post('/users/add', 'UsersController@add');
Route::get('/users/edit/{id?}', 'UsersController@edit');
Route::post('/users/edit/{id?}', 'UsersController@edit');
Route::get('/users/delete/{id?}', 'UsersController@delete');
Route::get('/myprofile', 'UsersController@myprofile');


Route::get('/leaveapplications', 'LeaveApplicationsController');
Route::post('/leaveapplications', 'LeaveApplicationsController');
Route::get('/leaveapplications/add', 'LeaveApplicationsController@add');
Route::post('/leaveapplications/add', 'LeaveApplicationsController@add');
Route::get('/leaveapplications/edit/{id?}', 'LeaveApplicationsController@edit');
Route::post('/leaveapplications/edit/{id?}', 'LeaveApplicationsController@edit');
Route::get('/leaveapplications/delete/{id?}', 'LeaveApplicationsController@delete');





Route::get('/applyforleave', 'LeaveApplicationsController@applyforleave');
Route::post('/applyforleave', 'LeaveApplicationsController@applyforleave');


Route::get('/myleaves', 'LeaveApplicationsController@myleaves');
