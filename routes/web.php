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

Auth::routes();


//Every route in this group is now protected by auth middleware. so no need to set it individually like on line 48
//Route::group(['middleware' =>  ['auth', 'web']], function () {
Route::group(['middleware' => ['auth']], function() {

  
    Route::get('/home', 'HomeController@index')->name('home');


    Route::post('post', [
        'uses' => 'PostController@Createpost',
        'as' => 'post'
    ]);

    Route::get('editpost/{id}', [
        'uses' => 'PostController@editpost',
        'as' => 'Edit'
    ]);

    Route::patch('updatepost/{id}', [
        'uses' => 'PostController@updatepost',
        'as' => 'post.update'
    ]);

    Route::delete('destroypost/{id}', [
        'uses' => 'PostController@destroypost',
        'as' => 'post.destroy'
    ]);


    Route::post('/Account', [
        'uses' => 'UserController@update_profilepic',
        'as' => 'Account',
    ]);

    Route::get('/Account', [
        'uses' => 'UserController@Account',
        'as' => 'Account',
    ]);

    Route::get('Story', [
        'uses' => 'UserController@Story',
        'as' => 'Story',
    ]);


    Route::get('users/{user}', [
        'uses' => 'UserController@show',
        'as' => 'user.show',
    ]);

    Route::get('users/{user}/Follow', [
        'uses' => 'UserController@Follow',
        'as' => 'user.follow',
    ]);

    Route::get('users/{user}/unFollow', [
        'uses' => 'UserController@unFollow',
        'as' => 'user.unfollow',
    ]);

    Route::post('search', [
        'uses' => 'SearchController@Postsearch',
        'as' => 'search',
    ]);

    Route::post('Postsearch', [
        'uses' => 'SearchController@Postsearch',
        'as' => 'Postsearch',
    ]);

    Route::get('post/{id}', [
        'uses' => 'PostController@show',
        'as' => 'post.show',
    ]);


    Route::post('comment/store', [
        'uses' => 'CommentController@store',
        'as' => 'comment.add'
    ]);

    Route::get('/notifications', 'NotificationsController@notifications');

    Route::get('comments', [
        'uses' => 'CommentController@fetchComments',
        'as' => 'comments'
    ]);


    Route::post('/notifications/read', [
        'uses' => 'NotificationsController@markAsRead',
        'as' => 'markAsRead',
    ]);



    Route::get('editcomment/{id}', [
        'uses' => 'CommentController@editcomment',
        'as' => 'EditComment'
    ]);

    Route::patch('updatecomment/{id}', [
        'uses' => 'CommentController@updatecomment',
        'as' => 'comment.update'
    ]);

    Route::delete('destroycomment/{id}', [
        'uses' => 'CommentController@destroycomment',
        'as' => 'comment.destroy'
    ]);

    Route::get('users/{user}', [
        'uses' => 'ProfilesController@show',
        'as' => 'user.show',
    ]);

    Route::get('/EditProfile', [
        'uses' => 'UserController@EditProfile',
        'as' => 'EditProfile'
    ]);

    Route::post('Saveaccount', [
        'uses' => 'UserController@Saveaccount',
        'as' => 'Saveaccount'
    ]);


    Route::get('Changepassword',[
        'uses' => 'UserController@showChangePasswordForm',
        'as' => 'Changepassword'
    ]);

    Route::post('changePassword', [
        'uses' => 'UserController@changePassword',
        'as' => 'changePassword',
    ]);

    Route::get('Weeklyupdates', [
        'uses' => 'UserController@Weeklyupdates',
        'as' => 'Weeklyupdates',
    ]);

    Route::get('Deleteaccount',[
        'uses' => 'UserController@deleteuser',
        'as' => 'Deleteaccount'
    ]);

    Route::post('destroy/{id}',[
        'uses' => 'UserController@destroy',
        'as' => 'user.destroy'
    ]);
});

