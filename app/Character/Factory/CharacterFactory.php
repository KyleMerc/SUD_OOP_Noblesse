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
        $character = new ReflectionClass(MainSet::class);
        $charMainSetting = \strtoupper($charName) . "_SETTING"; 

        if ($character->hasConstant($charMainSetting)) {
            $charValues = $character->getConstant($charMainSetting);
            return new MainCharacter($charValues['name'], $charValues['charType'], $charValues['weaponType']);
        }
        
        echo "\nInvalid character\n";
        return NULL;
    }

    public static function createEnemyCharacter(string $charName): ?Character
    {
        $enemy = new ReflectionClass(EnemySet::class);
        $charEnemySetting = \strtoupper($charName) . "_SETTING";

        if ($enemy->hasConstant($charEnemySetting)) {
            $enemyValues = $enemy->getConstant($charEnemySetting);

            $enemyChar = new Character($enemyValues['name'], $enemyValues['charType'], $enemyValues['weaponType']);
            
            if ($enemyValues['name'] == 'Nameless')
                $enemyChar->health = rand(40, 50);
            if ($enemyValues['name'] == 'Raizel')
                $enemyChar->health = 150;
            
            return $enemyChar;
        }

        echo "\nInvalid character\n";
        return NULL;
    }
}

var_dump(CharacterFactory::createEnemyCharacter('boss'));