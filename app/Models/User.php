<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function following()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function tweetsFromFollowing()
    {
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }
}
