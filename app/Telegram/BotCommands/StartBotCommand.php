<?php

namespace App\Telegram\BotCommands;

use App\Facades\Telegram;
use App\Telegram\TelegramController;

class StartBotCommand extends TelegramController
{
    public function __invoke()
    {
        Telegram::sendMessage($this->update['message']['chat']['id'], "Start");
    }
}
