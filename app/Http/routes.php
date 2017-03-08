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

Route::group(['middleware' => 'web'], function() {


    Route::get('/', [
        'uses' => 'PostController@getBlogIndex',
        'as' => 'blog.index'
    ]);
    Route::get('/blog/{post_id}', [
        'uses' => 'PostController@getSinglePost',
        'as' => 'blog.single'
    ]);

    // other
    Route::get('/about', function () {
        return view('frontend.other.about');
    })->name('about');
    Route::get('/contact', [
        'uses' => 'ContactMessageController@getContactIndex',
        'as' => 'contact'
    ]);
    Route::post('/contact/send', [
        'uses' => 'ContactMessageController@postSend',
        'as' => 'contact.send'
    ]);


    //admin
    Route::get('/admin/login', ['uses' => 'AdminController@getLogin', 'as' => 'admin.login']);
    Route::post('/admin/login', ['uses' => 'AdminController@postLogin', 'as' => 'admin.login.post']);
    Route::get('/admin/logout', ['uses' => 'AdminController@getLogOut', 'as' => 'admin.logout']);

    Route::group([
        'middleware' => ['auth'],
        'prefix' => 'admin'], function() {

        Route::get('/', ['uses' => 'AdminController@getIndex',
            'as' => 'admin.index']);
        // admin - posts action
        Route::get('/posts', ['uses' => 'PostController@getPosts', 'as' => 'admin.posts']);
        Route::get('/post/view/{post_id}', ['uses' => 'PostController@viewPost', 'as' => 'admin.post.view']);

        Route::get('/post/create', ['uses' => 'PostController@getCreatePost', 'as' => 'admin.post_create']);
        Route::post('/post/create', ['uses' => 'PostController@postCreatePost', 'as' => 'admin.post.create']);

        Route::get('/post/update/{post_id}', ['uses' => 'PostController@getUpdatePost', 'as' => 'admin.post_update']);
        Route::post('/post/update/{post_id}', ['uses' => 'PostController@postUpdatePost', 'as' => 'admin.post.update']);

        Route::get('/post/delete/{post_id}', ['uses' => 'PostController@getDeletePost', 'as' => 'admin.post.delete']);

        // admin - categories action
        Route::get('/categories', ['uses' => 'CategoryController@getCategoryIndex', 'as' => 'admin.categories']);
        Route::post('/categories/delete', ['uses' => 'CategoryController@postDeleteCategory', 'as' => 'admin.categories.delete']);
        Route::post('/categories/create', ['uses' => 'CategoryController@postCreateCategory', 'as' => 'admin.categories.create']);
        Route::post('/categories/update', [
            'uses' => 'CategoryController@postUpdateCategory',
            'as' => 'admin.categories.update'
        ]);

        Route::get('/messages', [
            'uses' => 'ContactMessageController@getMessages'
            , 'as' => 'admin.messages'
        ]);
        Route::post('/messages/delete', [
            'uses' => 'ContactMessageController@postMessageDelete'
            , 'as' => 'admin.messages.delete'
        ]);
    }); // end admin prefix
}); // end middleware-web
