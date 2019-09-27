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

    /**
     * Grab action of Main character
     *
     * @param array $newItem
     * @return void
     */
    public function grab(array $newItem): void
    {
        $items = $this->inventory;

        if (empty($newItem)) {
            echo "\nThere is no item here\n";
            return;
        }

        if ($items == NULL) {
            foreach ($newItem as $item) {
                echo "\nItem acquired: '$item' \n";
            }

            $this->inventory = $newItem;
            return;
        }
 
        foreach ($newItem as $item) {
            if (in_array($item, $items)) {
                echo "\nYou already have this item\n";
                return;
            }

            echo "Item acquired: '$item' \n";
            array_push($this->inventory, $item);
        }
    }

    /**
     * Show inventory of Main character
     *
     * @return void
     */
    public function showInventory(): void
    {
        echo "\nAvailable items:\n";

        if ($this->inventory == NULL) {
            echo "No items found...\n";
            return;
        }
            
        
        foreach ($this->inventory as $item) {
            echo $item . "\n";
        }
    }
}