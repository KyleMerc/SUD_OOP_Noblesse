<?php

namespace Noblesse\Room;

class Room
{
    /** @var string */
    private $name;

    /** @var bool */
    private $isLocked;

    /** @var string */
    private $dialogue;

    /** @var string */
    private $hint;

    /** @var array */
    private $items = [];

    /**
     * These 4 are Room type
     *
     * @var Room
     * @var Room
     * @var Room
     * @var Room
     */
    private $north;
    private $east;
    private $south;
    private $west;

    /**
     * Setting the room name and if its locked
     *
     * @param string $newName
     * @param bool $isDoorLocked
     */
    public function __construct(string $newName, bool $isDoorLocked = false)
    {
       $this->name      = $newName;
       $this->isLocked  = $isDoorLocked; 
    }

    public function __set($prop, $value): void
    {
        if (property_exists($this, $prop))
            $this->$prop = $value;
        else
            echo "No property found";
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop))
            return $this->$prop;
        else
            echo "No property found";
    }

    public function __toString(): string
    {
        $signBoard = <<<MSG
            ----------------------------------------
           |                 HINT                   |
             {$this->hint}
           |                                        |        
            ----------------------------------------\n
MSG;

        return $signBoard;
    }

    /**
     * Attaching to it's correct rooms
     *
     * @param string $direction
     * @param Room $room
     * @return void
     */
    public function attachRoom(string $direction, Room $room): void
    {
        if ($this->$direction) return;

        $this->$direction = $room;
        
        $attachedTo = self::getOppositeDirection($direction);
        $room->attachRoom($attachedTo, $this);    
    }

    /**
     * Returns the oppsite direction from the current room to
     * attached it to the opposite room.
     *
     * @param string $direction
     * @return string
     */
    private static function getOppositeDirection(string $direction): string
    {
        switch ($direction) {
            case 'north': return 'south';
            case 'east':  return 'west';
            case 'south': return 'north';
            case 'west':  return 'east';
        }
    }

    /**
     * Return null if no found locked room.
     * Return string for locked room options.
     *
     * @return string|null
     */
    public function foundLockedRooms(): ?string
    {
        $north = $this->north;
        $east  = $this->east;
        $south = $this->south;
        $west  = $this->west;
        $roomMsg = '';
        $roomOpt = '';

        if ($north && $north->isLocked) {
            $roomMsg .= "North: {$north->name}\n";
            $roomOpt .= ' [n]';
        } 
            
        if ($east  && $east->isLocked) {
            $roomMsg .= "East:  {$east->name}\n";
            $roomOpt .= ' [e]';
        } 
            
        if ($south && $south->isLocked) {
            $roomMsg .= "South: {$south->name}\n";
            $roomOpt .= ' [s]';
        } 
            
        if ($west  && $west->isLocked) {
            $roomMsg .= "West:  {$west->name}\n";
            $roomOpt .= ' [w]';
        } 
            

        if ($roomMsg === '') return NULL;

        echo "\nLocked Rooms";
        echo "\nCmd Options:$roomOpt";
        echo "\n-----------------\n";
        echo $roomMsg;
        echo "-----------------\n";

        return $roomOpt;
    }

    /**
     * Print the adjacent rooms of the current room.
     * Displays visual map of the room.
     *
     * @return array
     */
    public function foundRooms(): array
    {
        $north       = $this->north;
        $east        = $this->east;
        $south       = $this->south;
        $west        = $this->west;
        $roomMsg     = '';
        $roomDisplay = [];

        if ($north) {
            $roomMsg .= "North: {$north->name}\n"; 
            $roomDisplay['north'] = $north->name;
        } else $roomDisplay['north'] = '';

        if ($east) {
            $roomMsg .= "East:  {$east->name}\n";
            $roomDisplay['east'] = $east->name;
        } else $roomDisplay['east'] = '';

        if ($south) {
            $roomMsg .= "South: {$south->name}\n";
            $roomDisplay['south'] = $south->name;
        } else $roomDisplay['south'] = '';

        if ($west) {
            $roomMsg .= "West:  {$west->name}\n";
            $roomDisplay['west'] = $west->name;
        } else $roomDisplay['west'] = '';

        $visualMap = <<<MAP
                        {$roomDisplay['north']}
                              north
                                |
          {$roomDisplay['west']}                               {$roomDisplay['east']}             
            west -----                     ------ east 
                        
                                |
                              south
                            {$roomDisplay['south']}\n\n
MAP;

        echo "\n" . $visualMap;
        echo $this->dialogue;
        echo "\nAdjacent Rooms\n";
        echo "----------------\n";
        echo $roomMsg;
        echo "----------------\n";

        return $roomDisplay;
    }

    /**
     * Returns the next selected room
     *
     * @param string $direction
     * @return Room
     */
    public function goToNextRoom(string $direction): ?Room
    {
        if ($this->$direction) return $this->$direction;

        return NULL;
    }

    /**
     * 40% Enemy spawn chance(ambush)
     * 30% Enemy spawn chance
     *
     * @return bool
     */
    public function spawnEnemyChance(string $trap = ''): bool
    {
        $chance = rand(1, 100);
        $spawn  = false;

        if ($chance <= 30 && $trap == '') $spawn = true;
        if ($chance <= 35 && $trap == 'ambush') $spawn = true;
        
        return $spawn;
    }
}