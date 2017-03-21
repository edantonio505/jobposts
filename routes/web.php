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
Route::get('/', 'PagesController@index');
Route::get('/profile/{id}/edit', 'ProfileController@editProfile')->middleware('auth');
Route::post('/profile/{id}/edit', 'ProfileController@postEditProfile')->middleware('auth');
Route::get('/create_post', 'PostController@createPost')->middleware('auth');
Route::post('/create_post', 'PostController@postCreatePost')->middleware('auth');
Route::get('/test', 'PagesController@test');
Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::post('/change_user_type', 'ProfileController@changeType')->middleware('auth');
Route::get('/job/{id}', 'PostController@postDetail')->middleware('auth');
Route::get('/job/application/{job_id}', 'PostController@apply');
Route::get('/jobpost/{job_id}', 'PostController@applicants')->middleware('auth');
Route::get('/applicant/{id}/profile', 'ProfileController@applicantProfile');
Auth::routes();
