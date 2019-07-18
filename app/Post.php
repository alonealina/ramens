<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['fivestar', 'review', 'image_url','ramen_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ramen()
    {
        return $this->belongsTo(Ramen::class);
    }
}
