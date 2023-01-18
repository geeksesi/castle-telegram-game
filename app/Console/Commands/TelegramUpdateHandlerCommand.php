<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use Illuminate\Console\Command;

class TelegramUpdateHandlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $telegramService = app(TelegramService::class);
        $updateId = 0;
        $updates = $telegramService->getUpdated($updateId);
        foreach ($updates as $update) {
            $text = sprintf('Thank you for your "%s" message', $update['message']['text']);
            $telegramService->sendMessage($update['message']['chat']['id'], $text);
            $updateId = $update['update_id'];
        }
        $updates = $telegramService->getUpdated($updateId + 1);
        return Command::SUCCESS;
    }
}
