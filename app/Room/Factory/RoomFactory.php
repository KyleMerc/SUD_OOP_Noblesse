<?php

namespace Noblesse\Room\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Room\Factory\RoomSetting as Setting;

class RoomFactory
{
    /**
     * Creation of main character rooms
     *
     * @param string $roomOpt
     * @return array|null
     */
    public static function createCharRoom(string $roomOpt): ?array
    {
        $charRoom = $roomOpt . "Room";

        if (method_exists(Setting::class, $charRoom)) {
            return Setting::$charRoom();
        } else {
            echo "No character rooms found\n";
            return NULL;
        }
    }
}