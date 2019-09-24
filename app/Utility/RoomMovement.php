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
     * @param \Noblesse\Room\Room $mainChar
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
     * @return void
     */
    public function showRoomMenu(): void
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

            // Echo visual map and returns an array
            $foundRoomOpt = $this->currentRoom->foundRooms();
            $foundRoomOptDisplay = '';
            foreach ($foundRoomOpt as $key => $direction) {
                if (empty($direction)) continue;

                $oneChar = \substr($key, 0, 1);
                $foundRoomOptDisplay .= " [$oneChar]";
            }

            $opt = readline("Where to go?{$foundRoomOptDisplay}\n or Go back [q]: ");
            //----------------------------------

            if (preg_match(self::$regexDirection, $opt) == 0) echo "\nInvalid Command...\n";

            if ($opt === 'q') return;

            //This is where the changing of room happened.
            switch ($opt) {
                case 'n': 
                    $nextRoom = $north;
                    break;
                case 'e': 
                    $nextRoom = $east;
                    break;
                case 's': 
                    $nextRoom = $south;
                    break;
                case 'w': 
                    $nextRoom = $west; 
                    break;
            }

            if ($nextRoom) {
                if ($nextRoom->isLocked) {
                    echo $lockedRoomMsg;
                    continue;
                }

                $this->currentRoom = $nextRoom;
            } else echo $noRoomMsg;
            //------------------------------------

            if ($this->currentRoom->spawnEnemyChance('ambush'))
                echo "Fight";
        }
    }
}

$obj = new RoomMovement(\Noblesse\Room\Factory\RoomFactory::setCharRoom('frank'));
// $obj->currentRoom = $obj->currentRoom->goToNextRoom('west');
// $obj->currentRoom->foundRooms();
// $obj->currentRoom->foundLockedRooms();
$obj->showRoomMenu();