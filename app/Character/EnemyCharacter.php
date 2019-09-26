<?php

namespace Noblesse\Character;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Character\Character;

class EnemyCharacter extends Character
{
    public const ITEM = ['key'];

    public function __construct(string $newName, string $newCharType, string $newWeaponType)
    {
        parent::__construct($newName, $newCharType, $newWeaponType);
    }

    public function dropItemKeyChance(): bool
    {
        if (rand(1, 100) <= 40 && $this->name != 'Raizel') {
            return true;;
        }

        return false;
    }
}