<?php

namespace App\Services;

use App\Telegram\NotFoundController;
use App\Telegram\SuperCommands\SendToAllSuperCommand;
use ReflectionFunction;

class TelegramRouteHandlerService
{
    private $routes;
    private $update;
    public function __construct(array $update)
    {
        $this->routes = require_once base_path('routes/telegram.php');
        $this->update = $update;
    }

    public function execute()
    {
        $text = $this->update['message']['text'];
        if ($this->isSuperCommand($text)) {
            return $this->executeSuperCommand($text);
        }
        if ($this->isBotCommands($text)) {
            return $this->executeBotCommand($text);
        }
    }

    private function isSuperCommand(string $text): bool
    {
        return $text[0] == '!';
    }

    private function isBotCommands(string $text): bool
    {
        return $text[0] == '/';
    }

    private function executeSuperCommand(string $text)
    {
        try {
            $unCompress = explode(' ', $text, 2);
            $command = $unCompress[0];
            $callable = $this->routes['super_commands'][$command];
            $parameters = explode('\\*', $unCompress[1] ?? '');
            $argumentsCount = (new \ReflectionMethod($callable, '__invoke'))->getNumberOfParameters();

            throw_if(count($parameters) != $argumentsCount, new \Exception('Invalid arguments count'));
        } catch (\Throwable $th) {
            return (new NotFoundController($this->update))();
        }
        return (new $callable($this->update))(...$parameters);
    }

    private function executeBotCommand(string $text)
    {
        $superCommand = $this->routes['bot_commands'][$text];
        (new $superCommand($this->update))();
    }
}
