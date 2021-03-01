<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function index()
    {
        $headers = [
            'Accepts: application/json',
        ];
        $url = 'https://www.el-tiempo.net/api/json/v2/provincias/29';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);

        $datos = [];
        foreach ($response->ciudades as $ciudad) {
            $name = $ciudad->name;
            $cielo = $ciudad->stateSky->description;
            $tmax = $ciudad->temperatures->max;
            $tmin = $ciudad->temperatures->min;
            $datos[] = ["nombre" => $name, "cielo" => $cielo, "tmax" => $tmax, "tmin" =>$tmin];

        }
        return view('apis.index',["datos" => $datos]); 
    }
}
