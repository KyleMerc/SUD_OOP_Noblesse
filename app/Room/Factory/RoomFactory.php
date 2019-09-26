<?php

namespace Noblesse\Room\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Room\Factory\RoomSetting as Setting;
use Noblesse\Room\Room;
use Noblesse\Room\FourthRoom;
use Noblesse\Room\Factory\NewRoomSetting;

class RoomFactory
{

    /**
     * Returns the corresponding of the main character
     *
     * @param string $charName
     * @return Room|null
     */
    public static function setUpCharRoom(string $charName): ?Room
    {
        $charRoom = NewRoomSetting::ROOM_NAMESPACE . strtoupper($charName) . "_ROOM_SETTING";

        if (@constant($charRoom)) {
            $roomSetUp = constant($charRoom);

            //Creation of Room 1 - 4
            for ($i = 1; $i <= 4; $i++) {
                $room = 'room' . $i;

                if ($i === 4) {
                    $$room = new FourthRoom($roomSetUp[$room]['name'], $roomSetUp[$room]['isLocked']);
                    continue;
                }

                $$room = new Room($roomSetUp[$room]['name'], $roomSetUp[$room]['isLocked']);

                $$room->dialogue = $roomSetUp[$room]['dialogue'];
            }

            return $room1;
        }

        echo "Invalid option";
        return NULL;
    }
}