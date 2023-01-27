<?php

namespace App\Enums;

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
}
