<?php

namespace App\Enums;

enum ActionTypeEnum: string
{
    case UPGRADE_BUILDING = 'upgrade_building';
    case RESOURCE_GENERATION = 'resource_generation';
    case MILITARY_GENERATION = 'military_generation';
}
