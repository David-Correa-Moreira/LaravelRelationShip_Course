<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;
use COM;

class OneToOneController extends Controller
{
    public function OneToOne()
    {
        //$country = Country::find(1);
        $country = Country::where('name', 'China')->get()->first();
        echo $country->name;
        echo '<hr>';
        //$location = $country->location;
        $location = $country->location()->get()->first();
        echo "A longitude é: {$location->longitude} e a latitude é: {$location->longitude}";
    }

    public function oneToOneInverse()
    {
        $latitude  = 321;
        $longitude = 123;

        $location = Location::where('latitude', $latitude)
                    ->where('longitude', $longitude)
                    //->get()
                    ->first();
        
        //$country = $location->country;                    //Obter o dado do relacionamento pelo atributo
        $country = $location->country()->get()->first();    //obter o dado do relacionamento pelo método
        echo  $country->name;
    }

    public function OneToOneInsert() 
    {
        $dataForm = [
            'name'      => 'Inglaterra',
            'longitude' => 272,
            'latitude'  => 472,
        ];

        /*
         *Primeira maneira, cria o campo do pais, depois cria um objeto da model Location.
         Com o obejto criado, alimenta com as informações do array $dataForm e chama o método save(). 
         */

        $country = Country::create($dataForm);

        /*
        $location = new Location;

        $location->longitude = $dataForm['longitude'];
        $location->latitude  = $dataForm['latitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->save();
        */


        /*
        Segundo maneira, o objeto country chama a método location que relaciona o pais a longitude e latitude
        e ordena que crie os dados de logintude, latitude na model location
         */
        $location = $country->location()->create($dataForm);

        echo '<pre>';
        var_dump($location);
    }
}
