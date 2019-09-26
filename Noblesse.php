<?php

require_once __DIR__.'/vendor/autoload.php';

use Noblesse\Character\Misc\CharacterFactory as CharMake;
use Noblesse\Utility\CharUtil as Char;
use Noblesse\Room\Misc\RoomFactory as Room;
use Noblesse\Utility\RoomMovement;

use function Noblesse\Utility\{showPickChar, showCommands};

class Noblesse
{
    public static $mainChar;
    public static $room;

    public static function startGame(): void
    {
        $pickChar = CharMake::makeMainCharacter($opt = showPickChar());

        if ($pickChar) {
            self::$mainChar = $pickChar;
            self::$room     = new RoomMovement(Room::setUpCharRoom($opt));
        }
    }
}

Noblesse::startGame();