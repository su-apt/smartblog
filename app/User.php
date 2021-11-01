<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar_path',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){

        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(comment::class , 'user_id');
    }

    public function profile()
    {
        return $this->belongsToMany(Profiles::class , 'profiles' , 'user_id' , 'profile_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_following', 'following_id', 'follower_id')
        ->select('id', 'username', 'name');
    }


    public function following()
    {
        return $this->belongsToMany(User::class, 'follower_following', 'follower_id', 'following_id')
        ->select('id', 'username', 'name');
    }

}
