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
     * @param string $charType
     * @return MainCharacter|null
     */
    public static function makeMainCharacter(string $charType): ?MainCharacter
    {
        $character = $charType . "MainChar";

        if (strncmp($character, 'enemy', 5) === 0) {
            echo "You're making an enemy!\n";
            return NULL;
        }

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
        if (strncmp($charType, 'enemy', 5) < 0) {
            echo "You're making a main character\n";
            return NULL;
        }

        if (method_exists(CharSetting::class, $charType)) {
            return CharSetting::$charType();
        } else {
            echo "Invalid character\n";
            return NULL;
        }
    }
}