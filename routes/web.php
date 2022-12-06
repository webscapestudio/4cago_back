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


//Advertisement
Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
    Route::get('/', 'IndexController')->name('advertisements.index');
    Route::get('/{advertisement}', 'ShowController')->name('advertisement.show');
    Route::group(['namespace' => 'Favourite', 'prefix' => '{advertisement}/favourites'], function () {
        Route::post('/', 'StoreController')->name('advertisement.favourite.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{advertisement}/likes'], function () {
        Route::post('/', 'StoreController')->name('advertisement.like.store');
    });
    Route::group(['namespace' => 'Dislike', 'prefix' => '{advertisement}/dislikes'], function () {
        Route::post('/', 'StoreController')->name('advertisement.dislike.store');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => '{advertisement}/comments'], function () {
        Route::post('/', 'StoreController')->name('advertisement.comment.store');
        Route::post('/{comment}/edit', 'EditController')->name('advertisement.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('advertisement.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('advertisement.comment.destroy');
    });
});

//Post
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace' => 'Favourite', 'prefix' => '{post}/favourites'], function () {
        Route::post('/', 'StoreController')->name('post.favourite.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', 'StoreController')->name('post.like.store');
    });
    Route::group(['namespace' => 'Dislike', 'prefix' => '{post}/dislikes'], function () {
        Route::post('/', 'StoreController')->name('post.dislike.store');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
        Route::patch('/{comment}', 'UpdateController')->name('post.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('post.comment.destroy');
    });
});
//News
Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
    Route::get('/', 'IndexController')->name('news.index');
    Route::get('/{news}', 'ShowController')->name('news.show');
    Route::group(['namespace' => 'Favourite', 'prefix' => '{news}/favourites'], function () {
        Route::post('/', 'StoreController')->name('news.favourite.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{news}/likes'], function () {
        Route::post('/', 'StoreController')->name('news.like.store');
    });
    Route::group(['namespace' => 'Dislike', 'prefix' => '{news}/dislikes'], function () {
        Route::post('/', 'StoreController')->name('news.dislike.store');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => '{news}/comments'], function () {
        Route::post('/', 'StoreController')->name('news.comment.store');
        Route::patch('/{comment}', 'UpdateController')->name('news.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('news.comment.destroy');
    });
});
//Admin 
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    // Post admin 
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });
    // Advertisement admin 
    Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
        Route::get('/', 'IndexController')->name('admin.advertisement.index');
        Route::get('/{advertisement}', 'ShowController')->name('admin.advertisement.show');
        Route::delete('/{advertisement}', 'DestroyController')->name('admin.advertisement.destroy');
    });
    // Category admin CRUD
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
    // CategoryWork admin CRUD
    Route::group(['namespace' => 'CategoryWork', 'prefix' => 'categories_works'], function () {
        Route::get('/', 'IndexController')->name('admin.category_work.index');
        Route::get('/create', 'CreateController')->name('admin.category_work.create');
        Route::post('/', 'StoreController')->name('admin.category_work.store');
        Route::get('/{category_work}', 'ShowController')->name('admin.category_work.show');
        Route::get('/{category_work}/edit', 'EditController')->name('admin.category_work.edit');
        Route::patch('/{category_work}', 'UpdateController')->name('admin.category_work.update');
        Route::delete('/{category_work}', 'DestroyController')->name('admin.category_work.destroy');
    });
    // CategoryAdvertisement admin CRUD
    Route::group(['namespace' => 'CategoryAdvertisement', 'prefix' => 'categories_advertisements'], function () {
        Route::get('/', 'IndexController')->name('admin.category_advertisement.index');
        Route::get('/create', 'CreateController')->name('admin.category_advertisement.create');
        Route::post('/', 'StoreController')->name('admin.category_advertisement.store');
        Route::get('/{category_advertisement}', 'ShowController')->name('admin.category_advertisement.show');
        Route::get('/{category_advertisement}/edit', 'EditController')->name('admin.category_advertisement.edit');
        Route::patch('/{category_advertisement}', 'UpdateController')->name('admin.category_advertisement.update');
        Route::delete('/{category_advertisement}', 'DestroyController')->name('admin.category_advertisement.destroy');
    });
    // Tag admin CRUD
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
    // User admin CRUD
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });
    // News admin CRUD
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
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
        Route::get('/{post}', 'ShowController')->name('personal.main.show');
    });
    // Post personal CRUD
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/all', 'IndexController')->name('personal.post.index');
        Route::get('/create', 'CreateController')->name('personal.post.create');
        Route::post('/', 'StoreController')->name('personal.post.store');
        Route::get('/{post}', 'ShowController')->name('personal.post.show');
        Route::get('/{post}/edit', 'EditController')->name('personal.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('personal.post.update');
        Route::delete('/{post}', 'DestroyController')->name('personal.post.destroy');
    });
    // Post advertisement CRUD
    Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
        Route::get('/all', 'IndexController')->name('personal.advertisement.index');
        Route::get('/create', 'CreateController')->name('personal.advertisement.create');
        Route::post('/', 'StoreController')->name('personal.advertisement.store');
        Route::get('/{advertisement}', 'ShowController')->name('personal.advertisement.show');
        Route::get('/{advertisement}/edit', 'EditController')->name('personal.advertisement.edit');
        Route::patch('/{advertisement}', 'UpdateController')->name('personal.advertisement.update');
        Route::delete('/{advertisement}', 'DestroyController')->name('personal.advertisement.destroy');
    });
    //Post work CRUD
    Route::group(['namespace' => 'Work', 'prefix' => 'works'], function () {
        Route::get('/all', 'IndexController')->name('personal.work.index');
        Route::get('/create', 'CreateController')->name('personal.work.create');
        Route::post('/', 'StoreController')->name('personal.work.store');
        Route::get('/{work}', 'ShowController')->name('personal.work.show');
        Route::get('/{work}/edit', 'EditController')->name('personal.work.edit');
        Route::patch('/{work}', 'UpdateController')->name('personal.work.update');
        Route::delete('/{work}', 'DestroyController')->name('personal.work.destroy');
    });
    Route::group(['namespace' => 'Favourite', 'prefix' => 'favourites'], function () {
        Route::get('/all', 'IndexController')->name('personal.favourite.index');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'user_settings'], function () {
        Route::get('/{user}', 'EditController')->name('personal.user.profile_settings');
        Route::patch('/{user}', 'UpdateController')->name('personal.user.update');
    });
});
Auth::routes();
