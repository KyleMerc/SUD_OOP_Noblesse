<?php

namespace Noblesse\Character\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Character\Factory\MainCharacterSetting as MainSet;
use Noblesse\Character\Factory\EnemyCharacterSetting as EnemySet;
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
    public static function makeMainCharacter(string $charName): ?MainCharacter
    {
        if (constant(MainSet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING")) {
            $character = constant(MainSet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING");

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
    public static function makeEnemyCharacter(string $charName): ?Character
    {
        if (constant(EnemySet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING")) {
            $enemy = constant(EnemySet::CHAR_NAMESPACE . strtoupper($charName) . "_SETTING");

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