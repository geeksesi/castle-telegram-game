<?php

namespace App\Console\Commands;

use App\Facades\Telegram;
use App\Services\TelegramRouteHandlerService;
use App\Telegram\Requests\Request;
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
    protected $description = 'answer telegram messages without webhook';

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
            $request = app(Request::class, ['update' => $update]);
            app(TelegramRouteHandlerService::class, ['update' => $request])->execute();
            $updateId = $update['update_id'];
        }
        Telegram::getUpdated($updateId + 1);
        return Command::SUCCESS;
    }
}
