<?php

Auth::routes();
Route::get('/', 'PagesController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('profile/show', 'ProfileController@show')->name('profile.show');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('profile', 'ProfileController@update')->name('profile.update');

//Resource Routes
Route::resources([
    'categories' => 'CategoryController',
    'products' => 'ProductController',
    'services' => 'ServiceController',
    'posts' => 'PostController',
    'adverts' => 'AdvertController',
]);

//Front End Resources
Route::get('/items', 'ItemsController@index')->name('items.index');
Route::get('/service', 'ServicesController@index')->name('service.index');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{post}-{slug}', 'BlogController@show')->name('blog.show');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::patch('users/{user}', 'UserController@update')->name('users.update');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

//Comments
Route::post('/posts/{post}/comment', 'CommentController@store')->name('comments.store');
