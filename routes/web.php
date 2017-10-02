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


Route::post('/posts', 'PostsController@addPost')->name('new_post');
Route::get('/', 'PostsController@index')->name('main_page');


Route::get('/posts/new_post', 'PostsController@addPostIndex')->name('add_post');

Route::get('/posts/{postN}/', 'PostsController@definitePost')->name('definite_post');

Route::get('/registration', 'SecurityController@index')->name('registration');

Route::get('/my_cabinet', 'PostsController@userCabinetIndex')->name('user_cabinet');
Route::get('/delete/{delete_id}', 'PostsController@deletePost')->name('delete_post');
Route::get('/edit', 'PostsController@editPostIndex')->name('edit_post');
Route::post('/save/{edit_id}', 'PostsController@saveEditPost')->name('save_edit');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');