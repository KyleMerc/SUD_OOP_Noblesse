<?php

namespace Noblesse\Character;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use Noblesse\Character\Character;

class MainCharacter extends Character
{
    private $inventory;

    /**
     * Setting for main character
     *
     * @param string $defaultName
     * @param string $newCharType
     * @param string $newWeaponType
     */
    public function __construct(string $defaultName, string $newCharType, string $newWeaponType)
    {
        parent::__construct($defaultName, $newCharType, $newWeaponType);
    }

    public function grab(array $items): void
    {
        $this->inventory = $items;
    }

    public function showInventory(): void
    {
        echo "\nAvailable items:\n";

        if ($this->inventory == NULL)
            echo "\nNo items found...\n";
        else {
            foreach ($this->inventory as $item) {
                echo $item . "\n";
            }
        }
    }
}