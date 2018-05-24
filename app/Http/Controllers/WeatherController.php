<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $url = "https://xml.meteoservice.ru/export/gismeteo/point/104.xml" ;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json_output=curl_exec($ch);
        //var_dump($json_output);
        $languages = simplexml_load_string($json_output);
        //print_r($languages);
        $temperature['min'] = $languages->REPORT->TOWN->FORECAST->TEMPERATURE["min"][0];
        $temperature['max'] = $languages->REPORT->TOWN->FORECAST->TEMPERATURE["max"][0];
        return view('weather.show-weather', ['temperature' => $temperature]);
    }
}
