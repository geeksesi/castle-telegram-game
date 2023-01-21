<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * @todo make facade instead of class
 */
class TelegramService
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    protected function execute($method, $params = [])
    {
        $url = sprintf('https://api.telegram.org/bot%s/%s', $this->token, $method);
        $request = Http::post($url, $params);
        return $request->json('result', []);
    }

    public function getUpdated(int $offset)
    {
        $response = $this->execute('getUpdates', [
            'offset' => $offset
        ]);
        return $response;
    }

    public function sendMessage(string $chatId, string $text)
    {
        $response = $this->execute('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text
        ]);
        return $response;
    }
}
