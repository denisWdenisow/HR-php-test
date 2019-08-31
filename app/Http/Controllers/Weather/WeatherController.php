<?php

namespace App\Http\Controllers\Weather;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    // Запрос погода через API Яндекс.Погоды
    private function requestWeather()
    {
    	$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.weather.yandex.ru/v1/informers?lat=53.25209&lon=34.37167&lang=ru_RU',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				'X-Yandex-API-Key: 97de2439-bc23-4f3a-ae23-a698d5b243b6'
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ( $err ) {
			dump($err);
		} else {
			return $response;
		}
    }
    
    
    // Отображение результата пользователю
    public function showTemperature()
    {
    	$request = $this->requestWeather();
    	$temperature = json_decode($request,$assoc=true);
		return view('weather',['temperature'=>$temperature['fact']['temp']]);
	}
}
