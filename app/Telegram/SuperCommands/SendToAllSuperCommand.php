<?php

namespace App\Telegram\SuperCommands;

use App\Facades\Telegram;
use App\Telegram\Requests\Request;
use App\Telegram\TelegramController;

class SendToAllSuperCommand extends TelegramController
{
    public function __invoke(Request $request, string $username, ?string $text = null)
    {
        Telegram::sendMessage($request->getChatId(), "send To all command");
    }
}
