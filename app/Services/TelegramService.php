<?php
namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class TelegramService{

    public function sendMessage(string $message): void
    {
        $ids = ['461612832'];

        foreach ($ids as $id){
            $this->send($message, $id);
        }
    }
    public function send(string $message, string $chat_id): void
    {
        $bot_token = env('TG_BOT_KEY');

        try {
            $client = new Client([
                // Base URI is used with relative requests
                "base_uri" => "https://api.telegram.org",
            ]);

            $response = $client->request("GET", "/bot$bot_token/sendMessage", [
                "query" => [
                    "chat_id" => $chat_id,
                    "text" => $message,
                    "parse_mode" => "HTML"
                ]
            ]);

            $body = $response->getBody();
            $arr_body = json_decode($body);

            if ($arr_body->ok) {
                echo "Message posted.";
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}
