<?php

namespace Noblesse\Character\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Character\Factory\CharacterSetting as CharSetting;
use Noblesse\Character\MainCharacter;
use Noblesse\Character\Character;

class CharacterFactory
{
    /**
     * Returns the creation of main character
     *
     * @param string $charName
     * @return MainCharacter|null
     */
    public static function makeMainCharacter(string $charName): ?MainCharacter
    {
        $character = "set" . ucwords($charName) . "MainChar";

        if (method_exists(CharSetting::class, $character)) {
            return CharSetting::$character();
        } else {
            echo "Invalid character\n";
            return NULL;
        }
    }

    /**
     * Returns the creation of enemy character
     *
     * @param string $charType
     * @return Character|null
     */
    public static function makeEnemyCharacter(string $charType): ?Character
    {
        $enemy = "setEnemy" . ucwords($charType);

        if (method_exists(CharSetting::class, $enemy)) {
            return CharSetting::$enemy();
        } else {
            echo "Invalid character\n";
            return NULL;
        }
    }
}