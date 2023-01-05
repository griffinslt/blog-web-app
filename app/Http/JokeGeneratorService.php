<?php
namespace App\Http;

class JokeGeneratorService{
    private $apiUrl;
    private $joke; 

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
        $this->joke = json_decode(file_get_contents($this->apiUrl));
    }


    public function getSetup()
    {
        return $this->joke->setup;
    }

    public function getPunchline()
    {
        return $this->joke->punchline;
    }



}