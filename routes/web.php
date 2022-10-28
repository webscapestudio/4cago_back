<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
    Route::get('/', 'IndexController')->name('advertisements.index');
    Route::get('/{category}', 'ShowController')->name('advertisement.show');
});
Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
    Route::get('/', 'IndexController')->name('news.index');
});
//Admin 
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });
    Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
        Route::get('/', 'IndexController')->name('admin.advertisement.index');
        Route::get('/{advertisement}', 'ShowController')->name('admin.advertisement.show');
        Route::delete('/{advertisement}', 'DestroyController')->name('admin.advertisement.destroy');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
    Route::group(['namespace' => 'CategoryAdvertisement', 'prefix' => 'categories_advertisements'], function () {
        Route::get('/', 'IndexController')->name('admin.category_advertisement.index');
        Route::get('/create', 'CreateController')->name('admin.category_advertisement.create');
        Route::post('/', 'StoreController')->name('admin.category_advertisement.store');
        Route::get('/{category_advertisement}', 'ShowController')->name('admin.category_advertisement.show');
        Route::get('/{category_advertisement}/edit', 'EditController')->name('admin.category_advertisement.edit');
        Route::patch('/{category_advertisement}', 'UpdateController')->name('admin.category_advertisement.update');
        Route::delete('/{category_advertisement}', 'DestroyController')->name('admin.category_advertisement.destroy');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });
    Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
        Route::get('/', 'IndexController')->name('admin.news.index');
        Route::get('/create', 'CreateController')->name('admin.news.create');
        Route::post('/', 'StoreController')->name('admin.news.store');
        Route::get('/{news}', 'ShowController')->name('admin.news.show');
        Route::get('/{news}/edit', 'EditController')->name('admin.news.edit');
        Route::patch('/{news}', 'UpdateController')->name('admin.news.update');
        Route::delete('/{news}', 'DestroyController')->name('admin.news.destroy');
    });
});
//Personal
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('personal.post.index');
        Route::get('/create', 'CreateController')->name('personal.post.create');
        Route::post('/', 'StoreController')->name('personal.post.store');
        Route::get('/{post}', 'ShowController')->name('personal.post.show');
        Route::get('/{post}/edit', 'EditController')->name('personal.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('personal.post.update');
        Route::delete('/{post}', 'DestroyController')->name('personal.post.destroy');
    });
    Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
        Route::get('/', 'IndexController')->name('personal.advertisement.index');
        Route::get('/create', 'CreateController')->name('personal.advertisement.create');
        Route::post('/', 'StoreController')->name('personal.advertisement.store');
        Route::get('/{advertisement}', 'ShowController')->name('personal.advertisement.show');
        Route::get('/{advertisement}/edit', 'EditController')->name('personal.advertisement.edit');
        Route::patch('/{advertisement}', 'UpdateController')->name('personal.advertisement.update');
        Route::delete('/{advertisement}', 'DestroyController')->name('personal.advertisement.destroy');
    });
});
Auth::routes();
