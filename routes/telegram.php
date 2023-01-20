<?php

use App\Telegram\BotCommands\StartBotCommand;
use App\Telegram\NotFoundController;
use App\Telegram\SuperCommands\SendToAllSuperCommand;

return [
    'super_commands' => [
        '!sendToAll' => SendToAllSuperCommand::class,
        'notFound' => NotFoundController::class,
    ],
    'keyboard' => [],
    'bot_commands' => [
        '/start' => StartBotCommand::class,
    ],
    'text_commands' => [],
];
