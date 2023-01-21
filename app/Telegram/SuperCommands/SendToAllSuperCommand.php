<?php

namespace App\Telegram\SuperCommands;

use App\Facades\Telegram;
use App\Telegram\TelegramController;

class SendToAllSuperCommand extends TelegramController
{
    public function __invoke(string $username, ?string $text = null)
    {
        Telegram::sendMessage($this->update['message']['chat']['id'], "send To all command");
    }
}
