<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class FinalController extends Controller
{
    public function APIfunction($name){
        $client = new Client(
            [
                'base_uri' => config('services.passport.login_endpoint'),
                'verify' => config('app.debug') ? false : true,
                'defaults' => [
                    'exceptions' => false,
                ]
            ]
        );

        $response = $client->request('GET','https://api.genderize.io/',[
            'query' =>[
                'name' => $name
            ]
        ]);

        return $response;
    }
}