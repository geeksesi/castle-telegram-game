<?php

namespace App\Enums;

use App\Game\Abstracts\BuildingAbstract;
use App\Game\Building\ArmyCampBuilding;
use App\Game\Building\FarmBuilding;
use App\Game\Building\IronMineBuilding;
use App\Game\Building\MarketBuilding;
use App\Game\Building\MunicipalityBuilding;
use App\Game\Building\QuarryBuilding;
use App\Game\Building\WarehouseBuilding;
use App\Game\Building\WoodCutterBuilding;

enum BuildingEnum: string
{
    case FARM = 'farm';
    case Quarry = 'quarry';
    case IRON_MINE = 'iron_mine';
    case WOOD_CUTTER = 'wood_cutter';
    case WAREHOUSE = 'warehouse';
    case MUNICIPALITY = 'municipality';
    case ARMY_CAMP = 'army_camp';
    case MARKET = 'market';

    const INSTANCE = [
        self::FARM => FarmBuilding::class,
        self::Quarry => QuarryBuilding::class,
        self::IRON_MINE => IronMineBuilding::class,
        self::WOOD_CUTTER => WoodCutterBuilding::class,
        self::WAREHOUSE => WarehouseBuilding::class,
        self::MUNICIPALITY => MunicipalityBuilding::class,
        self::ARMY_CAMP => ArmyCampBuilding::class,
        self::MARKET => MarketBuilding::class,
    ];

    public function getInstance(): BuildingAbstract
    {
        return self::INSTANCE[$this->value];
    }
}
