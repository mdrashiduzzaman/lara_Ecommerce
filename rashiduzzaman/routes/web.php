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
Route::get('/', 'publicController@index')->name('index');
Route::get('about', 'publicController@about')->name('about');
Route::get('post/{id}', 'PublicController@singlePost')->name('singlePost');
Route::get('contact', 'PublicController@contact')->name('contact');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('user')->group(function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('comments', 'UserController@comments')->name('userComments');
    Route::post('deleteComment/{id}','UserController@deleteComment')->name('deleteComment');
    Route::get('profile', 'UserController@profile')->name('userProfile');
    Route::post('profile', 'userController@profilePost')->name('userProfilePost');
});

Route::prefix('author')->group(function(){
    Route::get('dashboard', 'AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts', 'AuthorController@posts')->name('authorPosts');
    Route::get('newPost', 'AuthorController@newPost')->name('newPost');
    Route::post('createPost', 'AuthorController@createPost')->name('createPost');
    Route::get('post/edit/{id}', 'AuthorController@editPost')->name('editPost');
    Route::post('post/{id}/edit', 'AuthorController@updatePost')->name('updatePost');
     Route::post('post/{id}/delete', 'AuthorController@deletePost')->name('deletePost');
    Route::get('comments', 'AuthorController@comments')->name('authorComments');
});

Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'adminController@dashboard')->name('adminDashboard');
    Route::get('posts', 'adminController@posts')->name('adminPosts');
    Route::get('comments', 'adminController@comments')->name('adminComments');
    Route::get('users', 'adminController@users')->name('adminUsers');
    Route::get('post/edit/{id}', 'adminController@adminEditPost')->name('adminEditPost');
    Route::post('post/{id}/edit', 'adminController@adminUpdatePost')->name('adminUpdatePost');
    Route::post('post/{id}/delete', 'adminController@adminDeletePost')->name('adminDeletePost');

}); 
