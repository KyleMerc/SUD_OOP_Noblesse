<?php

namespace Noblesse\Character\Utility;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

use Noblesse\Character\Character;
use Noblesse\Character\MainCharacter;

/**
 * For battle simulation, and see status
 */
class CharUtil
{
    /**
     * Battle interface for characters
     *
     * @param MainCharacter $mainChar
     * @param Character     $enemyChar
     * @return void
     */
<<<<<<< HEAD
    public static function battleStart(MainCharacter $mainChar, Character $enemyChar): ?string
=======
    public static function startBattle(MainCharacter $mainChar, Character $enemyChar): ?string
>>>>>>> oop/OOPMap
    {
        $mainCharName   = $mainChar->name;
        $enemyCharName  = $enemyChar->name . "({$enemyChar->charType})";
        $opt            = '';
        $extraSpace     = "\t   ";

        echo "$extraSpace A battle has started\n";
        while ($opt != 'run') {
<<<<<<< HEAD
            $opt = self::menuBattle($mainCharName, $enemyCharName);
=======
            $opt = self::showMenuBattle($mainCharName, $enemyCharName);
>>>>>>> oop/OOPMap

            switch (strtolower($opt)) {
                case 'atk':
                    $battleStatus = self::fight($mainChar, $enemyChar);

                    if ($battleStatus == 'victory') {
                        echo "\n$extraSpace You have killed the enemy\n";
                        return NULL;
                    }

                    if ($battleStatus == 'dead') {
                        echo "\n$extraSpace You have been killed by the enemy\n";
                        return "game over";
                    }

                    break;
                case 'aezakmi':
                    echo "\n$extraSpace Life at full health!!! cheaterrrr..\n";
                    $mainChar->health = 100;
                    break;
                case 'stat':
<<<<<<< HEAD
                    self::status($mainChar);
                    break;
                case 'estat':
                    self::status($enemyChar);
=======
                    self::getStatus($mainChar);
                    break;
                case 'estat':
                    self::getStatus($enemyChar);
>>>>>>> oop/OOPMap
                    break;
                case 'run':
                    echo "\n$extraSpace You run away\n";
                    return 'flee';
                default:
                    echo "\n$extraSpace Unknown command...\n";
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
<<<<<<< HEAD
    public static function menuBattle(string $mainCharName, string $enemyCharName): string
=======
    public static function showMenuBattle(string $mainCharName, string $enemyCharName): string
>>>>>>> oop/OOPMap
    {
        $lineLength = strlen($enemyCharName.$mainCharName) + 4;
        $line       = '';

        while ($lineLength > 0) {
            $line .= '-';
            $lineLength--;
        }

        $charOptions = '
            5 actions available
            ----------------------------
            Attack enemy        [atk]
            Run away            [run]
            See status          [stat]
            See enemy status    [estat]
            Cheat full health   [aezakmi]';

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
    public static function fight(MainCharacter $mainChar, Character $enemyChar): ?string
    {
        echo "\n\t    =====================\n";
        $mainChar->attack($enemyChar);
        sleep(1);
        $enemyChar->attack($mainChar);
        echo "\n\t    =====================\n";
        sleep(1);

        if ($mainChar->health == 0) return 'dead';
        elseif ($enemyChar->health == 0) return 'victory';
        else return NULL;
    }

    /**
     * Show the status of the character
     *
     * @param Character|MainCharacter $character
     * @return void
     */
<<<<<<< HEAD
    public static function status($character): void
=======
    public static function getStatus($character): void
>>>>>>> oop/OOPMap
    {
        $name           = $character->name;
        $health         = $character->health;
        $charType       = $character->charType;
        $weapon         = $character->weaponType;
        $damage         = $character->damage;

        $statusMsg = "
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