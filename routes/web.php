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

Auth::routes();
Route::get('/', 'ThingsController@index'); // I don't really need to name route because just using url('/') is shorter to write than route('home')
Route::get('account', 'AccountController@index')->name('account');


Route::get('reviews/create', function () {
    return redirect('/')->with('status', 'Choose a Thing before creating a review');
});

Route::get('things/{thing}/create_review', 'ReviewsController@create')->name('create_review_with_thing');

Route::resources([
    'things' => 'ThingsController',
    'reviews' => 'ReviewsController'
]);

