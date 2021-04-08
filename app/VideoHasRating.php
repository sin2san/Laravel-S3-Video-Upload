<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class VideoHasRating extends Authenticatable
{
    protected $table = 'video_has_rating';
    protected $fillable = ['user_id', 'video_id', 'rating'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function video()
    {
        return $this->belongsTo('App\Feed', 'video_id');
    }
}
