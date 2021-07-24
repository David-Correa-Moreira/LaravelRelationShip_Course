<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['longitude', 'latitude'];

    public function country()
    {
        //relacionamento oneToOneInverse
        return $this->belongsTo(Country::class);
        return $this->belongsTo(Country::class, 'country_id', 'id'); //caso decida nomear de forma alternativa os campos id e foreing
    }
}
