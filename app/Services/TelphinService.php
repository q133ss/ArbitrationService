<?php
namespace App\Services;

use GuzzleHttp\Client;

class TelphinService{
    public $host = "https://apiproxy.telphin.ru/api/ver1.0";

    public function getToken($newToken = false)
    {
        if($newToken){
            //get new token
        }
        return "oXdYNEqR6atERBDMpjvhT5YDHamQw8";
    }

    public function sendGetQuery(string $url)
    {
        //bearer token save to sesstion
        $client = new Client();
        $response = $client->request('GET', $this->host.$url, [
            'headers' => ['Authorization' => 'Bearer '.$this->getToken()]
        ]);
        return $response->getBody();
    }

    public function getNumbers()
    {
        return json_decode($this->sendGetQuery("/client/@me/did/"));
    }
}
