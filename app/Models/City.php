<?php

namespace App\Models;

use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentary');
    }
}
