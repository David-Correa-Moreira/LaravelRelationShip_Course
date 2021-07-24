<?php

use App\Models\State;
use Illuminate\Support\Facades\Route;

/**
 * relacionamento one to one
 */
Route::get('one-to-one', 'OneToOneController@OneToOne');
Route::get('one-to-oneInverse', 'OneToOneController@OneToOneInverse');
Route::get('one-to-oneInsert', 'OneToOneController@OneToOneInsert');

/**
 * relacionamento one to many
 */
Route::get('one-to-many', 'OneToManyController@oneToMany');
Route::get('one-to-many-inverse', 'OneToManyController@ManyToOne'); //recuperar inversamente
Route::get('one-to-many-Two', 'OneToManyController@oneToManyTwo');
Route::get('one-to-many-through', 'OneToManyController@oneToManythrough');

/**
 * Relacionamento many to many
 */

 Route::get('many-to-many', 'ManyToManyController@manyToMany');
 Route::get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse'); 
 Route::get('many-to-many-insert', 'ManyToManyController@manyToManyInsert');

 //polymorphic relationship
Route::get('polymorphic', 'PolymorphicController@polymorphic');
Route::get('polymorphicInsert', 'PolymorphicController@polymorphicInsert');

Route::get('/', function () {
    return view('welcome');
});
