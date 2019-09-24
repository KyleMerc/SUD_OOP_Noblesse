<?php

namespace Noblesse\Room\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Room\Room;
use Noblesse\Room\FourthRoom;

/**
 * This is where the setting of Main character rooms
 */
class RoomSetting
{

    /**
     * Frankenstein's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function frankRoom(): Room
    {
        $room1 = new Room('Upper Main Floor');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Bedroom');
        $room4 = new FourthRoom('Balcony', true);

        $room1->attachRoom('east', $room2);
        $room1->attachRoom('south', $room3);
        $room1->attachRoom('west', $room4);
         
        return $room1;
    }

    /**
     * Muzaka's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function muzakaRoom(): Room
    {
        $room1 = new Room('Basement');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Great Hall', true);
        $room4 = new FourthRoom('Vault', true);

        $room1->attachRoom('east', $room3);
        $room1->attachRoom('west', $room2);

        $room4->attachRoom('north', $room3);
        
        return $room1;
    }

    /**
     * Han Shinwoo's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function hanRoom(): Room
    {
        $room1 = new Room('Lower Main Hall');
        $room2 = new Room('Dining Room');
        $room3 = new Room('Secret Room', true);
        $room4 = new FourthRoom('Drawing Room', true);

        $room1->attachRoom('east', $room2);
        $room1->attachRoom('south', $room4);

        $room3->attachRoom('west', $room2);
        
        return $room1;
    }

    /**
     * M-21's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function m21Room(): Room
    {
        $room1 = new Room('Entrance Hall');
        $room2 = new Room('Gallery');
        $room3 = new Room('Rest Room');
        $room4 = new FourthRoom('Drawing Room', true);

        $room2->attachRoom('north', $room4);
        $room2->attachRoom('east', $room1);
        $room2->attachRoom('south', $room3);
        
        return $room1;
    }
}

$obj = RoomSetting::m21Room();
var_dump($obj);