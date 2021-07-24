<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        //recupera uma cidade
        $city = City::where('name', 'Manaus')->get()->first();
        echo "Os comentários da cidade <b>{$city->name}</b> são os seguintes: <hr>";
        
        $cityComments = $city->comments()->get();

        foreach ($cityComments as $cityComment) {
            echo $cityComment->description . '<hr>' ;
        }

        echo '<br><br><br>';

         //recupera uma estado
         $state = State::where('name', 'Amazonas')->get()->first();
         echo "Os comentários do estado <b>{$state->name}</b> são os seguintes: <hr>";
         
         $stateComments = $city->comments()->get();
 
         foreach ($stateComments as $stateComment) {
             echo $stateComment->description . '<hr>' ;
         }
 
         echo '<br><br><br>';

        //recupera um pais
        $country = Country::where('name', 'Brasil')->get()->first();
        echo "Os comentários do pais <b>{$country->name}</b> são os seguintes: <hr>";
        
        $countryComments = $city->comments()->get();

        foreach ($countryComments as $countryComment) {
            echo $stateComment->description . '<hr>' ;
        }
    }

    public function polymorphicInsert()
    {
        //recupera uma cidade

        $city = City::where('name', 'Manaus')->get()->first();
        echo "A cidade recuperada foi <b>{$city->name}</b>";

        //insere um comentário na cidade de manaus
        $comments = $city->comments()->create(['description' => "New comment of {$city->name} in ". date('d/m/Y'). ' at '. date('H:i:s').' ' ]);

        var_dump($comments->description);

        //recupera o estado
        $state = State::where('name', 'Amazonas')->get()->first();
        echo "<br>O estado recuperado foi <b>{$state->name}</b>";

        $commentsState = $state->comments()->create(['description' => "New comment of {$state->name} in {date('d/m/Y')} at {date('H:i:s')}"]);

        var_dump($comments->description);

         //recupera o pais
         $country = Country::where('name', 'Brasil')->get()->first();
         echo "<br>O Pais recuperado foi <b>{$country->name}</b>";
 
         $commentsCountry = $country->comments()->create(['description' => "New comment of {$country->name} in {date('d/m/Y')} at {date('H:i:s')}"]);
 
         var_dump($comments->description);

    }
}
