<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'initial'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentary');
    }
}
