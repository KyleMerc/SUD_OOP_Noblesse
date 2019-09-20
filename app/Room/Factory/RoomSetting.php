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
     * @return array
     */
    public static function frankRoom(): array
    {
        $room1 = new Room('Upper Main Floor');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Bedroom');
        $room4 = new FourthRoom('Balcony', true);

        $room1->setDirection(NULL, $room2, $room3, $room4);
        $room2->setDirection(NULL, NULL, NULL, $room1);
        $room3->setDirection($room1, NULL, NULL, NULL);
        $room4->setDirection(NULL, $room1, NULL, NULL);
        
        return [
            'firstRoom'  => $room1,
            'secondRoom' => $room2,
            'thirdRoom'  => $room3,
            'fourthRoom' => $room4
        ];
    }

    /**
     * Muzaka's room setting
     *
     * @return array
     */
    public static function muzakaRoom(): array
    {
        $room1 = new Room('Basement');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Great Hall', true);
        $room4 = new FourthRoom('Vault', true);

        $room1->setDirection(NULL, $room3, NULL, $room2);
        $room2->setDirection(NULL, NULL, NULL, $room1);
        $room3->setDirection(NULL, NULL, $room4, $room1);
        $room4->setDirection($room3, NULL, NULL, NULL);
        
        return [
            'firstRoom'  => $room1,
            'secondRoom' => $room2,
            'thirdRoom'  => $room3,
            'fourthRoom' => $room4
        ];
    }

    /**
     * Han Shinwoo's room setting
     *
     * @return array
     */
    public static function hanRoom(): array
    {
        $room1 = new Room('Lower Main Hall');
        $room2 = new Room('Dining Room');
        $room3 = new Room('Secret Room', true);
        $room4 = new FourthRoom('Drawing Room', true);

        $room1->setDirection(NULL, $room2, $room4, NULL);
        $room2->setDirection(NULL, $room3, NULL, $room1);
        $room3->setDirection(NULL, NULL, NULL, $room2);
        $room4->setDirection($room1, NULL, NULL, NULL);
        
        return [
            'firstRoom'  => $room1,
            'secondRoom' => $room2,
            'thirdRoom'  => $room3,
            'fourthRoom' => $room4
        ];
    }

    /**
     * M-21's room setting
     *
     * @return array
     */
    public static function m21Room(): array
    {
        $room1 = new Room('Entrance Hall');
        $room2 = new Room('Gallery');
        $room3 = new Room('Rest Room');
        $room4 = new FourthRoom('Drawing Room', true);

        $room1->setDirection(NULL, $room2, NULL, NULL);
        $room2->setDirection($room4, NULL, $room3, $room1);
        $room3->setDirection($room2, NULL, NULL, NULL);
        $room4->setDirection(NULL, NULL, $room2, NULL);
        
        return [
            'firstRoom'  => $room1,
            'secondRoom' => $room2,
            'thirdRoom'  => $room3,
            'fourthRoom' => $room4
        ];
    }
}