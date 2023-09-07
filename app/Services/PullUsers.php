<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PullUsers
{
        
    private static function formatResponse($response=null){
        return isset($response->json()['data']['rows']) ? $response->json()['data']['rows'] : [] ;
    }

    public static function get(){
        $response = Http::get(env('USERS_DATA_API_URL')); 
        return $users_data = static::formatResponse($response);
    }
}