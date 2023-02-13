<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_READER => 'Пользователь'
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function works()
    {
        return $this->hasMany(Work::class);
    }
    //Favourite--------------------------------------------------------
    public function  hasFavouritedPost(Post $post)
    {
        return (bool) $post->favourite
            ->where('user_id', $this->id)
            ->count();
    }
    public function  hasFavouritedAdvertisement(Advertisement $advertisement)
    {
        return (bool) $advertisement->favourite
            ->where('user_id', $this->id)
            ->count();
    }
    public function  hasFavouritedNews(News $news)
    {
        return (bool) $news->favourite
            ->where('user_id', $this->id)
            ->count();
    }
    public function  hasFavouritedWork(Work $work)
    {
        return (bool) $work->favourite
            ->where('user_id', $this->id)
            ->count();
    }
    function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
    //Like-------------------------------------------------------------
    public function hasLikedAdvertisement(Advertisement $advertisement)
    {
        return (bool) $advertisement->like
            ->where('user_id', $this->id)
            ->count();
    }
    public function hasLikedPost(Post $post)
    {
        return (bool) $post->like
            ->where('user_id', $this->id)
            ->count();
    }
    public function hasLikedNews(News $news)
    {
        return (bool) $news->like
            ->where('user_id', $this->id)
            ->count();
    }
    function liks()
    {
        return $this->hasMany(Like::class);
    }
    //Dislike-------------------------------------------------------------
    public function hasDislikedAdvertisement(Advertisement $advertisement)
    {
        return (bool) $advertisement->dislike
            ->where('user_id', $this->id)
            ->count();
    }
    public function hasDislikedPost(Post $post)
    {
        return (bool) $post->dislike
            ->where('user_id', $this->id)
            ->count();
    }
    public function hasDislikedNews(News $news)
    {
        return (bool) $news->dislike
            ->where('user_id', $this->id)
            ->count();
    }
    function disliks()
    {
        return $this->hasMany(Dislike::class);
    }
    //Comment-------------------------------------------------------------
    public function hasCommentedPost(Post $post)
    {
        return (bool) $post->comments
            ->where('user_id', $this->id)
            ->count();
    }
    public function hasCommentedAdvertisement(Advertisement $advertisement)
    {
        return (bool) $advertisement->comments
            ->where('user_id', $this->id)
            ->count();
    }

    public function hasCommentedNews(News $news)
    {
        return (bool) $news->comments
            ->where('user_id', $this->id)
            ->count();
    }
    function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
