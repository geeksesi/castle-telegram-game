<?php

namespace App\Telegram;

class TelegramController
{
    protected $update;
    public function __construct($update)
    {
        $this->update = $update;
    }
}
