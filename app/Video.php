<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Video extends Authenticatable
{
    protected $table = 'videos';
    protected $fillable = ['title', 'description', 'video', 'thumbnail', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function rating()
    {
        return $this->hasMany('App\VideoHasRating');
    }
}
