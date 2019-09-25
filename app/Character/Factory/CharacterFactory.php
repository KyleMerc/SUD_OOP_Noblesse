<?php

namespace Noblesse\Character\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Character\Factory\CharacterSetting as CharSetting;
use Noblesse\Character\Factory\MainCharacterSetting as MainSet;
use Noblesse\Character\Factory\EnemyCharacterSetting as EnemySet;
use ReflectionClass;
use Noblesse\Character\MainCharacter;
use Noblesse\Character\Character;

class CharacterFactory
{
    /**
     * Creation of main character
     *
     * @param string $charName
     * @return MainCharacter|null
     */
    public static function createMainCharacter(string $charName): ?MainCharacter
    {
        $charNameSpace = "Noblesse\Character\Factory\MainCharacterSetting::";

        if (constant($charNameSpace . strtoupper($charName) . "_SETTING")) {
            $character = constant($charNameSpace . strtoupper($charName) . "_SETTING");

            $charAddSetting = new MainCharacter($character['name'], $character['charType'], $character['weaponType']);
            $charAddSetting->damage = $character['damage'];

            return $charAddSetting;
        }
        
        echo "\nInvalid character\n";
        return NULL;
    }

    /**
     * Creation of enemy character
     *
     * @param string $charName
     * @return Character|null
     */
    public static function createEnemyCharacter(string $charName): ?Character
    {
        $enemyNameSpace = "Noblesse\Character\Factory\EnemyCharacterSetting::";

        if (constant($enemyNameSpace . strtoupper($charName) . "_SETTING")) {
            $enemy = constant($enemyNameSpace . strtoupper($charName) . "_SETTING");

            $enemyAddSetting = new Character($enemy['name'], $enemy['charType'], $enemy['weaponType']);
            $enemyAddSetting->damage = $enemy['damage'];

            if ($enemy['name'] == 'Raizel') $enemyAddSetting->health = 150;

            if ($enemy['name'] == 'Nameless') $enemyAddSetting->health = rand(40, 50);

            return $enemyAddSetting;
        }

        echo "\nInvalid character\n";
        return NULL;
    }
}

var_dump(CharacterFactory::createEnemyCharacter('vampire'));