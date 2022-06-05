<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;;

class ProjectController 
{
    public static function getData(){
        return Cars::all();
    }

    public static function upData(){
        $data = [
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Pontiac_Firebird_-_Flickr_-_exfordy_%281%29.jpg/300px-Pontiac_Firebird_-_Flickr_-_exfordy_%281%29.jpg',
            'city' => 'Oregon',
            'brand' => 'Pontiac',
            'model' => 'Pontiac Firebird',
            'description' => 'Motor V8',
            'year' => '2002',
            'mileage' => '8240',
            'exchange' => 'Manual',
            'store_phone' => '(14) 4484-8773',
            'value' => '10000',
        ];

        Cars::create($data);


        $data2 = [
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Ford_Mustang_%281964%29_-_28540253076.jpg/280px-Ford_Mustang_%281964%29_-_28540253076.jpg',
            'city' => 'Kentucky',
            'brand' => 'Ford',
            'model' => 'Ford Mustang 69',
            'description' => 'FR layout',
            'year' => '1965',
            'mileage' => '70040',
            'exchange' => 'Manual',
            'store_phone' => '(14) 8541-8773',
            'value' => '7000',
        ];

        Cars::create($data2);

        $data3 = [
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/1970_Plymouth_Barracuda_Coupe.jpg/300px-1970_Plymouth_Barracuda_Coupe.jpg',
            'city' => 'Kentucky',
            'brand' => 'Plymouth',
            'model' => 'Plymouth Barracuda',
            'description' => 'FR layout',
            'year' => '1964',
            'mileage' => '90040',
            'exchange' => 'Manual',
            'store_phone' => '(14) 8945-4000',
            'value' => '11000',
        ];

        Cars::create($data3);
    }

    public static function getValues(Request $request){
        
        $data = $request->input('data');

        $init_value = $data['init_value'];
        $car = $data['car'];
        
        $value = $car['value'] - $init_value;

        $x6 = $value/6;
        $x12 = $value/12;
        $x48 = $value/48;

        $value = [
            
            'x6' => $x6,
            'x12' => $x12,
            'x48' => $x48,

        ];
       

        return $value;

    }
}

