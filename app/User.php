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
        'name', 'email', 'password', 'admin',
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


    //Relationship methods
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function viewShip()
    {
        return $this->belongsToMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Utility methods
    public function avatar()
    {
        return $this->profile->image->url ?? "/img/avatar.png";
    }

    public function role()
    {
        return $this->admin ? 'Admin' : 'Regular';
    }

    //Local scoping methods
    public function scopeAdmins($query)
    {
        return $query->where('admin', true);
    }
}
