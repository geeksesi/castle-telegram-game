<?php

namespace App\Telegram;

use App\Services\TelegramService;

class NotFoundController extends TelegramController
{
    protected $update;
    public function __construct($update)
    {
        $this->update = $update;
    }

    public function __invoke()
    {
        $chatId = $this->update['message']['chat']['id'];
        $text = 'Command not found';

        return \Telegram::sendMessage($chatId, $text);
    }
}
