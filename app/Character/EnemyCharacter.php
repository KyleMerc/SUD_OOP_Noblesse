<?php

namespace Noblesse\Character;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Character\Character;

class EnemyCharacter extends Character
{
    private $item;
    // private const ITEMS = [];

    public function __construct(string $newName, string $newCharType, string $newWeaponType)
    {
        parent::__construct($newName, $newCharType, $newWeaponType);
    }

    public function isItemDrop(): bool
    {
        return false;
    }
}