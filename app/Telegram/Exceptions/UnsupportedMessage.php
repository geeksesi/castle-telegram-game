<?php

namespace App\Telegram\Exceptions;

use App\Facades\Telegram;
use App\Telegram\Requests\Request;
use App\Telegram\TelegramController;

class UnsupportedMessage extends TelegramController
{

    public function __invoke(Request $request)
    {
        $chatId = $request->getChatId();
        $text = 'un supported message';

        return Telegram::sendMessage($chatId, $text);
    }
}
