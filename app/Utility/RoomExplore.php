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

    /**
     * Sets the room for the main character
     *
     * @param string $mainChar
     */
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

    /**
     * Initialized the room setup for the main character
     *
     * @param string $mainCharName
     * @return void
     */
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

    /**
     * Return null if one locked room found.
     * Return false if no locked room found.
     *
     * @return boolean
     */
    public function foundLockedRooms(): bool
    {
        $north = $this->currentRoom->north();
        $east  = $this->currentRoom->east();
        $south = $this->currentRoom->south();
        $west  = $this->currentRoom->west();
        $roomMsg = '';

        if ($north && $north->isLocked) $roomMsg .= "\nNorth: {$north->name}\n";
        if ($east  && $east->isLocked)  $roomMsg .= "\nEast: {$east->name}\n";
        if ($south && $south->isLocked) $roomMsg .= "\nSouth: {$south->name}\n";
        if ($west  && $west->isLocked)  $roomMsg .= "\nWest: {$west->name}\n";

        if ($roomMsg === '') return false;

        echo "\nLocked Rooms";
        echo "\nCmd Options: [n]/[e]/[s]/[w]";
        echo "\n-----------------";
        echo $roomMsg;
        echo "-----------------\n";

        return true;
    }


}