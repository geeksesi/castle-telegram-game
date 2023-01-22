<?php

namespace App\Services;

use App\Telegram\Exceptions\NotFoundController;
use App\Telegram\Exceptions\UnsupportedMessage;
use App\Telegram\Requests\Request;
use App\Telegram\SuperCommands\SendToAllSuperCommand;
use ReflectionFunction;

class TelegramRouteHandlerService
{
    private $routes;
    private Request $update;
    public function __construct(Request $update)
    {
        $this->routes = require_once base_path('routes/telegram.php');
        $this->update = $update;
    }

    public function execute()
    {
        if (!$this->update->isText()) {
            return app()->call(UnsupportedMessage::class, ['request' => $this->update]);
        }

        $text = $this->update->getText();
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
            $parameters = [$this->update, ...$parameters];

            $callableReflation = new \ReflectionMethod($callable, '__invoke');
            $argumentsCount = $callableReflation->getNumberOfRequiredParameters();
            throw_if(count($parameters) < $argumentsCount, new \Exception('Invalid arguments count'));
        } catch (\Throwable $th) {
            return app()->call(NotFoundController::class, ['request' => $this->update]);
        }
        $parameters = $this->syncParameterToFunctionParameter($callableReflation->getParameters(), $parameters);

        return app()->call($callable, $parameters);
    }

    private function syncParameterToFunctionParameter(array $functionParameters, array $parameters): array
    {
        $output = [];
        foreach ($parameters as $key => $value) {
            $name = $functionParameters[$key]->getName();
            $output[$name] = $value;
        }
        return $output;
    }

    private function executeBotCommand(string $text)
    {
        $superCommand = $this->routes['bot_commands'][$text];
        return app()->call($superCommand, ['request' => $this->update]);
    }
}
