<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;

class TelphinService{
    public $host = "https://apiproxy.telphin.ru/api/ver1.0";

    public function getToken($newToken = false)
    {
        $token = request()->cookie('token');
        if($token == null){
            $newToken = true;
        }

        if($newToken){
            //get new token
            $client = new Client();
            $response = $client->request('POST',"https://apiproxy.telphin.ru/oauth/token", [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'application_id' => env('TEL_APP_ID'),
                    'application_secret' => env('TEL_APP_SECRET'),
                    'grant_type' => 'client_credentials'
                ]
            ]);
            $token = json_decode($response->getBody())->access_token;
            Cookie::queue('token', $token, 60);
        }
        return $token;
    }

    public function sendGetQuery(string $url, $params = [])
    {
        $client = new Client();
        $response = $client->request('GET', $this->host.$url, [
            'headers' => ['Authorization' => 'Bearer '.$this->getToken()],
            'query' => $params
        ]);
        return $response->getBody();
    }

    public function getNumbers()
    {
        return json_decode($this->sendGetQuery("/client/@me/did/"));
    }

    public function getCalls(array $params)
    {
        $data = json_decode($this->sendGetQuery("/client/@me/calls/", $params));

        //$data->calls->duration = продолжительность
        //$data->calls->from_username = от кого
        return $data->calls;
    }
}
