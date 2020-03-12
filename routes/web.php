<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/poems', 'publicController@allPoems')->name('web-poems');
Route::get('/upponas', 'publicController@allUpponas')->name('web-upponas');
Route::get('/category/{slug}', 'publicController@categoryPost')->name('web-category');
Route::get('/about', 'publicController@about')->name('web-about');
Route::get('/privacy', 'publicController@privacy')->name('web-privacy');
Route::get('/contact', 'publicController@contact')->name('web-contact');
Route::post('/contact', 'publicController@sendEmail')->name('web-send-email');
Route::post('/comment', 'publicController@putComment')->name('web-put-comment');






Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

    Route::middleware('auth')->group(function () {
        // home routes 
        Route::get('/', 'adminHomeController@index')->name('home');
        // poem routes
        Route::get('/posts', 'postsController@index')->name('posts');
        Route::get('/post/add', 'postsController@add')->name('add-posts');
        Route::get('/post/show/{id}','postsController@show')->name('post-show');
        Route::get('/post/{id}','postsController@edit')->name('post-edit');
        Route::post('/post-update','postsController@update')->name('post-update');
        Route::post('/post-store','postsController@store')->name('post-store');
        Route::post('/post-delete','postsController@delete')->name('post-delete');
        // categories routes
        Route::get('/categories','categoriesController@index')->name('categories');
        Route::get('/category/add','categoriesController@add')->name('add-category');
        Route::get('/category/show/{id}','categoriesController@show')->name('category-show');
        Route::get('/category/{id}','categoriesController@edit')->name('category-edit');
        Route::post('/category-update','categoriesController@update')->name('category-update');
        Route::post('/category-store','categoriesController@store')->name('category-store');
        Route::post('/category-delete','categoriesController@delete')->name('category-delete');
        // comments routes
        Route::get('/comments','commentsController@index')->name('comments');
        Route::get('/comment/{id}','commentsController@show')->name('comment-show');
        Route::post('/comment-active','commentsController@active')->name('comment-active');
        Route::post('/comment-not-active','commentsController@not_active')->name('comment-not-active');
        // emails routes
        Route::get('/emails','emailsController@index')->name('emails');
        Route::get('/email/{id}','emailsController@show')->name('email-show');
        Route::post('/email-send','emailsController@send')->name('email-send');
        Route::post('/comment-delete','emailsController@delete')->name('email-delete');
        // profile routes
        Route::get('/profile','profilesController@index')->name('profile');
        Route::post('/profile-update','profilesController@update')->name('profile-update');
        Route::post('/passowrd-change','profilesController@passowrd_change')->name('passowrd-change');
        // users routes 
        Route::get('/users','usersController@index')->name('users');
        Route::get('/user/{id}','usersController@edit')->name('user-edit');
        Route::get('/user/show/{id}','usersController@show')->name('user-show');
        Route::post('/user-update','usersController@update')->name('user-update');
        Route::post('/user-store','usersController@store')->name('user-store');
        Route::post('/user-delete','usersController@delete')->name('user-delete');
        // settings 
        Route::get('/settings','settingsController@index')->name('settings');
        Route::post('/settings','settingsController@settings_update')->name('settings-update');
        // about
        Route::get('/settings/about','aboutController@about')->name('about');
        Route::post('/settings/about','aboutController@update')->name('about-update');
        // privacy
        Route::get('/settings/privacy','privacyController@privacy')->name('about');
        Route::post('/settings/privacy','privacyController@update')->name('about-update');   
    });
});
