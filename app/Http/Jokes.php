<?php

namespace App\Http;
use Illuminate\Support\Facades\Http;


class Jokes
{
    private $apiKey;
    private $url;

    public function __construct($apiKey, $url){

        $this->apiKey = $apiKey;
        $this->url = $url;
    }

    public function getJokes(){
        $response = Http::withHeaders([
            'X-Api-Key' => $this->apiKey,
        ])->get($this->url);

        return $response;

    }
}