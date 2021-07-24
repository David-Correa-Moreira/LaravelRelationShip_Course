<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{

    protected $fillable = ['name'];

    public function location()
    {
        //relacionamento oneToOne direto
        return $this->hasOne(Location::class);
    }

    public function states()
    {
                            //sintax(model::class, 'nome chave estrangeira', 'referencia para a chave')
        return $this->hasMany(State::class, 'country_id', 'id');
    }

    //método que faz o relacionamento entre models distantes
    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentary');
    }
}
