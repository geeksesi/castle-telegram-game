<?php

namespace App\Game\Building;

use App\Enums\PropertiesEnum;
use App\Game\Abstracts\BuildingAbstract;

class MarketBuilding extends BuildingAbstract
{
    protected string $name = 'Market';
    protected int $level = 1;
    protected int $maxLevel = 10;
    protected array $cost = [
        PropertiesEnum::FOOD => 100,
        PropertiesEnum::STONE => 100,
        PropertiesEnum::IRON => 100,
        PropertiesEnum::WOOD => 100,
    ];
    protected array $production = [
        PropertiesEnum::FOOD => 100,
    ];
    protected array $requirements = [];
}
