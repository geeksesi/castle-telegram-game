<?php

namespace App\Telegram\BotCommands;

use App\Facades\Telegram;
use App\Telegram\Requests\Request;
use App\Telegram\TelegramController;

class StartBotCommand extends TelegramController
{
    public function __invoke(Request $request)
    {
        Telegram::sendMessage($request->getChatId(), "Start");
    }
}
