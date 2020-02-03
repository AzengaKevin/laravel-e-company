<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    //Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function views()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }


    //Utilities

    public function imageUrl()
    {
        return $this->image->url ?? '/img/avatar.png';
    }

    public function url()
    {
        return "/blog/{$this->id}-" . Str::slug($this->title);
    }
}
