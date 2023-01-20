<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * @todo make facade instead of static class
 */
class TelegramService
{
    private static $token;

    protected static function getToken(): string
    {
        if (static::$token) {
            return static::$token;
        }
        static::$token = env('TELEGRAM_BOT_TOKEN');
        return static::$token;
    }

    protected static function execute($method, $params = [])
    {
        $url = sprintf('https://api.telegram.org/bot%s/%s', static::getToken(), $method);
        $request = Http::post($url, $params);
        return $request->json('result', []);
    }

    public static function getUpdated(int $offset)
    {
        $response = static::execute('getUpdates', [
            'offset' => $offset
        ]);
        return $response;
    }

    public static function sendMessage(string $chatId, string $text)
    {
        $response = static::execute('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text
        ]);
        return $response;
    }
}
