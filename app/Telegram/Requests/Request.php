<?php

namespace App\Telegram\Requests;

use App\Models\User;

class Request
{
    private array $update;
    private User $user;


    public function __construct(array $update)
    {
        $this->update = $update;
    }

    public function getText(): string
    {
        return $this->update['message']['text'] ?? null;
    }

    public function isText(): bool
    {
        return isset($this->update['message']['text']);
    }

    public function getChatId(): string
    {
        return $this->update['message']['chat']['id'];
    }

    public function getUser(): User
    {
        return $this->user = $this->user ?? $this->getOrCreateUser();
    }

    private function getOrCreateUser(): User
    {
        return User::where('telegram_id', $this->update['message']['from']['id'])->firstOrCreate([
            'telegram_id' => $this->update['message']['from']['id'],
            'name' => $this->update['message']['from']['first_name'],
            'username' => $this->update['message']['from']['username'],
        ]);
    }

    public function toArray(): array
    {
        return $this->update;
    }
}
