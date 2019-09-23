<?php

namespace Noblesse\Utility;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Room\Factory\RoomFactory as Room;

class RoomExplore
{
    private $currentRoom;
    private static $regexDirection = '/^[^a-z0-9]*([newsq])[^a-z0-9]*$/';

    /**
     * Sets the room for the main character
     *
     * @param string $mainChar
     */
    public function __construct(string $mainCharOpt)
    {
        $this->currentRoom = Room::createCharRoom($mainCharOpt);
    }

    //For test purposes only
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

        if ($north && $north->isLocked) $roomMsg .= "North: {$north->name}\n";
        if ($east  && $east->isLocked)  $roomMsg .= "East:  {$east->name}\n";
        if ($south && $south->isLocked) $roomMsg .= "South: {$south->name}\n";
        if ($west  && $west->isLocked)  $roomMsg .= "West:  {$west->name}\n";

        if ($roomMsg === '') return false;

        echo "\nLocked Rooms";
        echo "\nCmd Options: [n]/[e]/[s]/[w]";
        echo "\n-----------------\n";
        echo $roomMsg;
        echo "-----------------\n";

        return true;
    }

    /**
     * Print the adjacent rooms of the current room.
     * Displays visual map of the room.
     *
     * @return void
     */
    public function foundRooms(): void
    {
        $north       = $this->currentRoom->north();
        $east        = $this->currentRoom->east();
        $south       = $this->currentRoom->south();
        $west        = $this->currentRoom->west();
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
                            {$roomDisplay['south']}
MAP;

        echo "\n" . $visualMap;
        echo "\nAdjacent Rooms\n";
        echo "----------------\n";
        echo $roomMsg;
        echo "----------------\n";
    }

    /**
     * Show room menu
     *
     * @return void
     */
    public function roomMenu(): void
    {
        $opt = '';
        $noRoomMsg = "
        -----------------
        | No Room Found |
        -----------------\n";
        $lockedRoomMsg = "
        ------------------
        | DOOR IS LOCKED |
        ------------------\n";

        while($opt != 'homeMenu') {
            $north       = $this->currentRoom->north();
            $east        = $this->currentRoom->east();
            $south       = $this->currentRoom->south();
            $west        = $this->currentRoom->west();

            $this->foundRooms();

            $opt = readline("Where to go?\n[n]/[e]/[s]/[w] or Go back [q]: ");

            if (preg_match(self::$regexDirection, $opt) == 0)
                echo "\nInvalid Command...\n";

            if ($opt === 'q') $opt = 'homeMenu';

            //This is where the changing of room happened.
            switch ($opt) {
                case 'n': 
                    if ($north) {
                        if ($north->isLocked) {
                            echo $lockedRoomMsg;
                            break;
                        }

                        $this->currentRoom = $north;
                    } else echo $noRoomMsg;

                    break;
                case 'e': 
                    if ($east) {
                        if ($east->isLocked) {
                            echo $lockedRoomMsg;
                            break;
                        }

                        $this->currentRoom = $east;
                    } else echo $noRoomMsg;

                    break;
                case 's': 
                    if ($south) {
                        if ($south->isLocked) {
                            echo $lockedRoomMsg;
                            break;
                        }

                        $this->currentRoom = $south;
                    } else echo $noRoomMsg;    

                    break;
                case 'w': 
                    if ($west) {
                        if ($west->isLocked) {
                            echo $lockedRoomMsg;
                            break;
                        }

                        $this->currentRoom = $west;
                    } else echo $noRoomMsg;    

                    break;
            }

            if ($this->currentRoom->enemySpawnChance('ambush'))
                echo "Fight";
        }
    }
}

$obj = new RoomExplore('m21');
$obj->roomMenu();