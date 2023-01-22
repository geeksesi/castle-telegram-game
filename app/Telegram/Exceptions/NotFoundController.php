<?php

namespace App\Telegram\Exceptions;

use App\Facades\Telegram;
use App\Telegram\Requests\Request;
use App\Telegram\TelegramController;

class NotFoundController extends TelegramController
{

    public function __invoke(Request $request)
    {
        $chatId = $request->getChatId();
        $text = 'Command not found';

        return Telegram::sendMessage($chatId, $text);
    }
}
