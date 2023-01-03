<?php
namespace App\Http;

class JokeGenerator{
    public $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }




}