<?php

namespace App\Game\Abstracts;

abstract class BuildingAbstract
{
    protected string $name;
    protected int $level;
    protected int $maxLevel;
    protected array $cost;
    protected array $production;
    protected array $requirements;

    public function __construct()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getMaxLevel(): int
    {
        return $this->maxLevel;
    }

    public function getCost(): array
    {
        return $this->cost;
    }

    public function getProduction(): array
    {
        return $this->production;
    }

    public function getRequirements(): array
    {
        return $this->requirements;
    }

    public function isMaxLevel(): bool
    {
        return $this->level === $this->maxLevel;
    }

    public function isUpgradeable(): bool
    {
        return !$this->isMaxLevel();
    }

    public function isBuildable(): bool
    {
        return $this->level === 0;
    }

    public function isUpgradable(): bool
    {
        return $this->level > 0;
    }
}
