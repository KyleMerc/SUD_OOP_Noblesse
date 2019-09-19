<?php

namespace Noblesse\Utility;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Room\Factory\RoomFactory as Room;

class RoomExplore
{
    private $currentRoom;
    private $nextRoom;
    private $setUpRoom;
    private $mainChar;

    public function __construct(string $mainChar)
    {
        $this->mainChar = $mainChar;
        $this->setCharRooms($this->mainChar);
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop))
            return $this->$prop;
        else
            echo "No property found";
    }

    private function setCharRooms(string $mainCharName): void
    {
        switch ($mainCharName) {
            case 'Frankenstein':
                $this->setUpRoom   = Room::frankRoom();
                $this->currentRoom = $this->setUpRoom['firstRoom'];
                break;
            case 'Muzaka':
                $this->setUpRoom   = Room::muzakaRoom();
                $this->currentRoom = $this->setUpRoom['firstRoom'];
                break; 
            case 'Han Shinwoo':
                $this->setUpRoom   = Room::hanRoom();
                $this->currentRoom = $this->setUpRoom['firstRoom'];
                break; 
            case 'M-21':
                $this->setUpRoom   = Room::m21Room();
                $this->currentRoom = $this->setUpRoom['firstRoom'];
                break;    
        }
    }
}