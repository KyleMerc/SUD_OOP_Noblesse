<?php

namespace Noblesse\Utility;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Room\Room;

class RoomMovement
{
    private $currentRoom;
    private static $regexDirection = '/^[^a-z0-9]*([newsq])[^a-z0-9]*$/';

    /**
     * Sets the room for the main character
     *
     * @param string $mainChar
     */
    public function __construct(Room $mainCharRoom)
    {
        $this->currentRoom = $mainCharRoom;
    }

    public function __get($prop)
    {
        if (property_exists($this, $prop))
            return $this->$prop;
        else
            echo "No property found";
    }

    /**
     * Show room menu
     *
     * @return string
     */
    public function roomMenu(): string
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

        while(true) {
            $north       = $this->currentRoom->north;
            $east        = $this->currentRoom->east;
            $south       = $this->currentRoom->south;
            $west        = $this->currentRoom->west;

            $this->currentRoom->foundRooms();

            $opt = readline("Where to go?\n[n]/[e]/[s]/[w] or Go back [q]: ");

            if (preg_match(self::$regexDirection, $opt) == 0) echo "\nInvalid Command...\n";

            if ($opt === 'q') return 'homeMenu';

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

$obj = new RoomMovement(\Noblesse\Room\Factory\RoomFactory::setCharRoom('m21'));
// $obj->currentRoom = $obj->currentRoom->goToNextRoom('west');
$obj->currentRoom->foundRooms();