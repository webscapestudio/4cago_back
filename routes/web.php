<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
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
Route::get('/email/verify',  function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    $request->fulfill();
    return redirect()->intended(RouteServiceProvider::HOME);
})->middleware('auth', 'signed')->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    $request->user()->sendEmailVerificationNotification();
    return redirect()->back()->with('success', 'Ссылка для подтверждения почты отправлена!');
})->middleware('auth')->name('verification.send');
//Advertisement
Route::group(['namespace' => 'CategoryAdvertisement', 'prefix' => 'categories_advertisements'], function () {
    Route::get('/', 'IndexController')->name('categories_advertisements.index');
    Route::group(['namespace' => 'Advertisement', 'prefix' => '/{categories_advertisements}/advertisements'], function () {
        Route::get('/', 'IndexController')->name('advertisement.index');
        Route::get('/search', 'SearchController')->name('advertisement.search');
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
        Route::group(['namespace' => 'BannedReason', 'prefix' => '{advertisement}/banned_reason', 'middleware' => ['auth', 'verified']], function () {
            Route::post('/', 'StoreController')->name('advertisement.banned_reason.store');
        });
    });
});
//Post
Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
    Route::get('/', 'IndexController')->name('categories_posts.index');
    Route::group(['namespace' => 'Post', 'prefix' => '/{category}/posts'], function () {
        Route::get('/', 'IndexController')->name('post.index');
        Route::get('/search', 'SearchController')->name('post.search');
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
        Route::group(['namespace' => 'BannedReason', 'prefix' => '{post}/banned_reason', 'middleware' => ['auth', 'verified']], function () {
            Route::post('/', 'StoreController')->name('post.banned_reason.store');
        });
    });
});
//News
Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
    Route::get('/', 'IndexController')->name('news.index');
    Route::get('/search', 'SearchController')->name('news.search');
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
    Route::group(['namespace' => 'BannedReason', 'prefix' => '{news}/banned_reason', 'middleware' => ['auth', 'verified']], function () {
        Route::post('/', 'StoreController')->name('news.banned_reason.store');
    });
});
//MarketingFaq
Route::group(['namespace' => 'MarketingFaq', 'prefix' => '/faq/faq_marketings'], function () {
    Route::get('/all', 'IndexController')->name('faq.faq_marketing.index');
    Route::get('/{faq_marketing}', 'ShowController')->name('faq.faq_marketing.show');
});
//Rules
Route::group(['namespace' => 'Rules', 'prefix' => '/faq/rules'], function () {
    Route::get('/all', 'IndexController')->name('faq.rule.index');
    Route::get('/{rules}', 'ShowController')->name('faq.rule.show');
});
//Help
Route::group(['namespace' => 'CategoryHelp', 'prefix' => '/faq/categories_asked_questions'], function () {
    Route::get('/all', 'IndexController')->name('faq.category_asked_question.index');
    Route::group(['namespace' => 'Help', 'prefix' => '{category_asked_question}/asked_questions'], function () {
        Route::get('/{asked_question}', 'ShowController')->name('faq.asked_question.show');
    });
});
//Rules
Route::group(['namespace' => 'Contacts', 'prefix' => '/faq/contacts'], function () {
    Route::get('/all', 'IndexController')->name('faq.contact.index');
    Route::get('/{contact}', 'ShowController')->name('faq.contact.show');
});
//Work
Route::group(['namespace' => 'CategoryWork', 'prefix' => 'categories_works'], function () {
    Route::get('/', 'IndexController')->name('categories_works.index');
    Route::group(['namespace' => 'Work', 'prefix' => '/{categories_works}/works'], function () {
        Route::get('/', 'IndexController')->name('work.index');
        Route::get('/search', 'SearchController')->name('work.search');
        Route::get('/{work}', 'ShowController')->name('work.show');
        Route::group(['namespace' => 'Favourite', 'prefix' => '{work}/favourites'], function () {
            Route::post('/', 'StoreController')->name('work.favourite.store');
        });
        Route::group(['namespace' => 'BannedReason', 'prefix' => '{work}/banned_reason', 'middleware' => ['auth', 'verified']], function () {
            Route::post('/', 'StoreController')->name('work.banned_reason.store');
        });
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
        Route::get('/search', 'SearchController')->name('admin.post.search');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });
    // Advertisement admin 
    Route::group(['namespace' => 'Advertisement', 'prefix' => 'advertisements'], function () {
        Route::get('/', 'IndexController')->name('admin.advertisement.index');
        Route::get('/search', 'SearchController')->name('admin.advertisement.search');
        Route::get('/{advertisement}', 'ShowController')->name('admin.advertisement.show');
        Route::delete('/{advertisement}', 'DestroyController')->name('admin.advertisement.destroy');
    });
    // Work admin 
    Route::group(['namespace' => 'Work', 'prefix' => 'works'], function () {
        Route::get('/', 'IndexController')->name('admin.work.index');
        Route::get('/search', 'SearchController')->name('admin.work.search');
        Route::get('/{work}', 'ShowController')->name('admin.work.show');
        Route::delete('/{work}', 'DestroyController')->name('admin.work.destroy');
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
        Route::get('/search', 'SearchController')->name('admin.tag.search');
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
        Route::get('/search', 'SearchController')->name('admin.user.search');
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
        Route::get('/search', 'SearchController')->name('admin.news.search');
        Route::get('/create', 'CreateController')->name('admin.news.create');
        Route::post('/', 'StoreController')->name('admin.news.store');
        Route::get('/{news}', 'ShowController')->name('admin.news.show');
        Route::get('/{news}/edit', 'EditController')->name('admin.news.edit');
        Route::patch('/{news}', 'UpdateController')->name('admin.news.update');
        Route::delete('/{news}', 'DestroyController')->name('admin.news.destroy');
    });
    // Rules admin CRUD
    Route::group(['namespace' => 'Rules', 'prefix' => 'rules'], function () {
        Route::get('/', 'IndexController')->name('admin.rule.index');
        Route::get('/create', 'CreateController')->name('admin.rule.create');
        Route::post('/', 'StoreController')->name('admin.rule.store');
        Route::get('/{rules}', 'ShowController')->name('admin.rule.show');
        Route::get('/{rules}/edit', 'EditController')->name('admin.rule.edit');
        Route::patch('/{rules}', 'UpdateController')->name('admin.rule.update');
        Route::delete('/{rules}', 'DestroyController')->name('admin.rule.destroy');
    });
    // CategoryHelp admin CRUD
    Route::group(['namespace' => 'CategoryHelp', 'prefix' => 'categories_asked_questions'], function () {
        Route::get('/', 'IndexController')->name('admin.category_question.index');
        Route::get('/create', 'CreateController')->name('admin.category_question.create');
        Route::post('/', 'StoreController')->name('admin.category_question.store');
        Route::get('/{categories_asked_question}', 'ShowController')->name('admin.category_question.show');
        Route::get('/{categories_asked_question}/edit', 'EditController')->name('admin.category_question.edit');
        Route::patch('/{categories_asked_question}', 'UpdateController')->name('admin.category_question.update');
        Route::delete('/{categories_asked_question}', 'DestroyController')->name('admin.category_question.destroy');
    });
    // Help admin CRUD
    Route::group(['namespace' => 'Help', 'prefix' => 'asked_questions'], function () {
        Route::get('/', 'IndexController')->name('admin.asked_question.index');
        Route::get('/create', 'CreateController')->name('admin.asked_question.create');
        Route::post('/', 'StoreController')->name('admin.asked_question.store');
        Route::get('/{asked_question}', 'ShowController')->name('admin.asked_question.show');
        Route::get('/{asked_question}/edit', 'EditController')->name('admin.asked_question.edit');
        Route::patch('/{asked_question}', 'UpdateController')->name('admin.asked_question.update');
        Route::delete('/{asked_question}', 'DestroyController')->name('admin.asked_question.destroy');
    });
    // CategoryMarketing admin CRUD
    Route::group(['namespace' => 'MarketingFaq', 'prefix' => 'faq_marketings'], function () {
        Route::get('/', 'IndexController')->name('admin.faq_marketing.index');
        Route::get('/create', 'CreateController')->name('admin.faq_marketing.create');
        Route::post('/', 'StoreController')->name('admin.faq_marketing.store');
        Route::get('/{faq_marketing}', 'ShowController')->name('admin.faq_marketing.show');
        Route::get('/{faq_marketing}/edit', 'EditController')->name('admin.faq_marketing.edit');
        Route::patch('/{faq_marketing}', 'UpdateController')->name('admin.faq_marketing.update');
        Route::delete('/{faq_marketing}', 'DestroyController')->name('admin.faq_marketing.destroy');
    });
    // Contacts admin CRUD
    Route::group(['namespace' => 'Contacts', 'prefix' => 'contacts'], function () {
        Route::get('/', 'IndexController')->name('admin.contact.index');
        Route::get('/create', 'CreateController')->name('admin.contact.create');
        Route::post('/', 'StoreController')->name('admin.contact.store');
        Route::get('/{contact}', 'ShowController')->name('admin.contact.show');
        Route::get('/{contact}/edit', 'EditController')->name('admin.contact.edit');
        Route::patch('/{contact}', 'UpdateController')->name('admin.contact.update');
        Route::delete('/{contact}', 'DestroyController')->name('admin.contact.destroy');
    });
    // RightBanner admin CRUD
    Route::group(['namespace' => 'RightBanner', 'prefix' => 'right_banners'], function () {
        Route::get('/', 'IndexController')->name('admin.right_banner.index');
        Route::get('/create', 'CreateController')->name('admin.right_banner.create');
        Route::post('/', 'StoreController')->name('admin.right_banner.store');
        Route::get('/{right_banner}', 'ShowController')->name('admin.right_banner.show');
        Route::get('/{right_banner}/edit', 'EditController')->name('admin.right_banner.edit');
        Route::patch('/{right_banner}', 'UpdateController')->name('admin.right_banner.update');
        Route::delete('/{right_banner}', 'DestroyController')->name('admin.right_banner.destroy');
    });
    // LeftBanner admin CRUD
    Route::group(['namespace' => 'LeftBanner', 'prefix' => 'left_banners'], function () {
        Route::get('/', 'IndexController')->name('admin.left_banner.index');
        Route::get('/create', 'CreateController')->name('admin.left_banner.create');
        Route::post('/', 'StoreController')->name('admin.left_banner.store');
        Route::get('/{left_banner}', 'ShowController')->name('admin.left_banner.show');
        Route::get('/{left_banner}/edit', 'EditController')->name('admin.left_banner.edit');
        Route::patch('/{left_banner}', 'UpdateController')->name('admin.left_banner.update');
        Route::delete('/{left_banner}', 'DestroyController')->name('admin.left_banner.destroy');
    });
    // UpperBanner admin CRUD
    Route::group(['namespace' => 'UpperBanner', 'prefix' => 'upper_banners'], function () {
        Route::get('/', 'IndexController')->name('admin.upper_banner.index');
        Route::get('/create', 'CreateController')->name('admin.upper_banner.create');
        Route::post('/', 'StoreController')->name('admin.upper_banner.store');
        Route::get('/{upper_banner}', 'ShowController')->name('admin.upper_banner.show');
        Route::get('/{upper_banner}/edit', 'EditController')->name('admin.upper_banner.edit');
        Route::patch('/{upper_banner}', 'UpdateController')->name('admin.upper_banner.update');
        Route::delete('/{upper_banner}', 'DestroyController')->name('admin.upper_banner.destroy');
    });
    Route::group(['namespace' => 'BannedReason', 'prefix' => 'banned_reasons'], function () {
        Route::get('/', 'IndexController')->name('admin.banned_reason.index');
        Route::get('/search', 'SearchController')->name('admin.banned_reason.search');
        Route::patch('/{banned_reason}', 'ReportController')->name('admin.banned_reason.report');
        Route::get('/{banned_reason}', 'ShowController')->name('admin.banned_reason.show');
        Route::delete('/{banned_reason}', 'DestroyController')->name('admin.banned_reason.destroy');
    });
});
//Personal
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
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
    Route::group(['namespace' => 'Publish', 'prefix' => 'published'], function () {
        Route::get('/all', 'IndexController')->name('personal.published.index');
    });
});
Auth::routes();
