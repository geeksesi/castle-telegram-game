<?php

namespace App\Console\Commands;

use App\Facades\Telegram;
use App\Services\TelegramRouteHandlerService;
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
        $updateId = 0;
        $updates = Telegram::getUpdated($updateId);
        foreach ($updates as $update) {
            (new TelegramRouteHandlerService($update))->execute();
            $updateId = $update['update_id'];
        }
        Telegram::getUpdated($updateId + 1);
        return Command::SUCCESS;
    }
}
