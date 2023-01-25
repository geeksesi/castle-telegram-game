<?php

namespace App\Enums;

enum PropertiesEnum: string
{
    case POPULATION = 'population';

    case FOOD = 'food';
    case IRON = 'iron';
    case WOOD = 'wood';
    case STONE = 'stone';

    case SWORDMAN = 'swordsman';
    case ARCHER = 'archer';
    case KNIGHT = 'knight';

    public function isMilitary(): bool
    {
        return in_array($this->value, [
            self::SWORDMAN,
            self::ARCHER,
            self::KNIGHT,
        ]);
    }

    public function isResource(): bool
    {
        return in_array($this->value, [
            self::FOOD,
            self::IRON,
            self::WOOD,
            self::STONE,
        ]);
    }
}
