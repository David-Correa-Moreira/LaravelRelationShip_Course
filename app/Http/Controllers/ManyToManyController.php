<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'Manaus')->get()->first();
        echo "<b> A cidade de {$city->name} tem as seguintes empresas: </b>";

        $companies = $city->companies;
       
        foreach ($companies as $company)
            echo "{$company->name} ,";

        echo '<br>';
    }

    public function manyToManyInverse()
    {
        //recupera o objeto de company
        $company = Company::where('name', 'Centro do Reforço')->get()->first();
        echo "<b>A empresa {$company->name} está nas seguintes cidades: </b>";
        
        $cities = $company->cities;
       
        foreach ($cities as $city)
            echo "{$city->name} ,";

        echo '<br>';

    }

    public function manyToManyInsert()
    {
        //objetivo: inscrever uma empresa em várias cidades

        //matrix com id das cidades
        $dataForm = [1,2,3,4,5];

        //1 - recupera a empresa desejada
        $company = Company::where('name', 'Centro do Reforço')->get()->first();
        echo "<b>A empresa {$company->name} foi inserida nas seguintes cidades: </b>";

        //insere os relacionamentos das cidades informados pelo id
        //$company->cities()->attach($dataForm);

        //remove todos os relacionamento das cidades informados pelos ids;
        $company->cities()->detach($dataForm);
 
        $cities = $company->cities;
        foreach ($cities as $city)
            echo "{$city->name} ,";

        echo '<br>';

    }
}
