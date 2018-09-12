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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('admin/post', ['as' => 'post.index', 'uses' => 'PostController@index']);
//    Route::get('sml_admin/post', ['as' => 'voyager.posts.create', 'uses' => 'PostController@create', 'middleware' => ['permission:page-list|page-create|page-edit|page-delete']]);
});
