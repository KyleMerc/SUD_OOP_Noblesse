<?php

namespace Noblesse\Character\Utility;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

use Noblesse\Character\Character;
use Noblesse\Character\MainCharacter;

use Noblesse\Character\Factory\CharacterFactory as Factory;

/**
 * For battle simulation, and see status
 */
abstract class CharUtil
{
    /**
     * Battle interface for characters
     *
     * @param MainCharacter $mainChar
     * @param Character     $enemyChar
     * @return void
     */
    public static function battleStart(MainCharacter $mainChar, Character $enemyChar): ?string
    {
        $mainCharName   = $mainChar->name;
        $enemyCharName  = $enemyChar->name . "({$enemyChar->charType})";
        $opt            = '';
        $extraSpace     = "\t   ";

        echo "$extraSpace A battle has started\n";
        while ($opt != 'run') {
            $opt = self::menuBattle($mainCharName, $enemyCharName);

            switch (strtolower($opt)) {
                case 'atk':
                    self::fight($mainChar, $enemyChar);

                    if ($enemyChar->health == 0) {
                        echo "\n$extraSpace You have killed the enemy\n";
                        return NULL;
                    }

                    if ($mainChar->health == 0) {
                        echo "\n$extraSpace You have been killed by the enemy\n";
                        return "game over";
                    }

                    break;
                case 'run':
                    echo "\n$extraSpace You run away\n";
                    return 'flee';
            }
        }
    }

    /**
     * A simple battle UI
     *
     * @param string $mainCharName
     * @param string $enemyCharName
     * @return string
     */
    public static function menuBattle(string $mainCharName, string $enemyCharName): string
    {
        $lineLength = strlen($enemyCharName.$mainCharName) + 4;
        $line       = '';

        while ($lineLength > 0) {
            $line .= '-';
            $lineLength--;
        }

        $charOptions = '
            2 actions available
            -------------------
            Attack enemy [atk]
            Run away     [run]';

        $menu = "
            $mainCharName vs $enemyCharName
            $line
            $charOptions
            $line\n";

        echo $menu;
        return readline("\t    Choose: ");
    }

    /**
     * Actual fight scene
     *
     * @param MainCharacter $mainChar
     * @param Character     $enemyChar
     * @return void
     */
    public static function fight(MainCharacter $mainChar, Character $enemyChar): void
    {
        echo "\n\t    =====================\n";
        $mainChar->attack($enemyChar);
        sleep(1);
        $enemyChar->attack($mainChar);
        echo "\n\t    =====================\n";
        sleep(1);
    }

    public static function status(MainCharacter $mainChar): void
    {
        $name       = $mainChar->name;
        $health     = $mainChar->health;
        $charType   = $mainChar->charType;
        $weapon     = $mainChar->weaponType;
        $damage     = $mainChar->damage;

        $statusMsg = "
                  Room: 
                  ----------------------------------------------
                  |                                            |
                     Name: $name -- Health: $health / 100
                  |                                            |
                     Character Type: $charType
                  |                                            |
                     Weapon: $weapon
                  |                                            |          
                     Damage: {$damage['0']} - {$damage['1']}          
                  |                                            |          
                  ----------------------------------------------\n";
        
        echo $statusMsg;
    }
}
$mainChar = Factory::Human();
$enemyChar =  Factory::enemyVampire();

CharUtil::battleStart($mainChar, $enemyChar);
CharUtil::status($mainChar);