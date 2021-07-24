<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        //maneira de pegar um coletion de paises tipo pesquisa
        $shearch = 'a';

        //query para busca já com o relacionamento
        $countries = Country::where('name', 'LIKE', "%{$shearch}%")->with('states')->get(); 
      
        foreach ($countries as $country) {
            echo "Pais - {$country->name}<br>";

            /***
             * query obtem um pais especifico
             
            $country = Country::where('name', 'Brasil')->get()->first();
            echo $country->name;
            $states = $country->states()->where('initial', 'AM')->get(); //select especifico */
        
            $states = $country->states; //select por atributo
            
            
            foreach ( $states as $state) {
                echo "<br>{$state->initial} - {$state->name}";
            }
            echo '<hr>';
        }
    }

    public function ManyToOne()
    {
        $stateName = 'Beigim';

        //*******recuperei o estado********
        $state = State::where('name', $stateName)->get()->first();

        echo "Estado recuperado é {$state->name}<hr>";

        //******alternativa para chamar o relacionamento pelo atributo
        //$country = $state->country;

        //alternativa para chamar o relacionamento pelo método
        $country = $state->country()->get()->first();
        

        echo "O estado do {$state->name} pertence ao pais {$country->name}";
    }

    public function oneToManyTwo()
    {
        $shearch = 'a';

        $countries = Country::where('name', 'LIKE', "%{$shearch}%")->with('states')->get();
        
        foreach ($countries as $country)
        {
            echo " O {$country->name} tem os seguintes estado:<br>";
                foreach ($country->states as $state) {
                    echo "{$state->name} - {$state->initial}";

                    foreach ($state->cities as $city)
                        echo " : {$city->name}, ";
            }
            echo '<hr>';

        }
    }

    public function oneToManyInsert()
    {

        $dataForm = [
            'name'    => 'Russia',
            'name1'    => 'Moscou',
            'initial' => 'MOW'
        ];

        $insertData = Country::create(['name' => 'Argentina'])->states()->create([
                                                                        'name'    => 'Buenos Aires',
                                                                        'initial' => 'BUA'
                                                                      ]);

        echo '<pre>';
        dd($insertData);
    }

    public function oneToManythrough()
    {
        $country = Country::find(1);
        echo "O pais {$country->name} tem as seguintes cidades: <br>";
        $cities = $country->cities;

        foreach ($cities as $city)
        {
            echo "{$city->name}-{$city->initial} , ";
        }
        echo '<hr>';
    }
}
