<?php

namespace Noblesse\Room;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Room\Interfaces\Direction;

class Room implements Direction
{
    private $name;
    private $isLocked;
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

    /**
     * Set the connected rooms
     *
     * @param \Noblesee\Room\Room $north
     * @param \Noblesee\Room\Room $east
     * @param \Noblesee\Room\Room $south
     * @param \Noblesee\Room\Room $west
     * @return void
     */
    public function setDirection(
        Room $north = NULL, 
        Room $east  = NULL, 
        Room $south = NULL, 
        Room $west  = NULL): void {

        $this->north    = $north;
        $this->east     = $east;
        $this->south    = $south;
        $this->west     = $west;
    }

    /**
     * Returns north room
     *
     * @return \Noblesse\Room\Interfaces\Direction|null
     */
    public function north(): ?Direction
    {
        return $this->north;
    }

    /**
     * Returns east room
     *
     * @return \Noblesse\Room\Interfaces\Direction|null
     */
    public function east(): ?Direction
    {
        return $this->east;
    }

    /**
     * Returns south room
     *
     * @return \Noblesse\Room\Interfaces\Direction|null
     */
    public function south(): ?Direction
    {
        return $this->south;
    }

    /**
     * Returns west room
     *
     * @return \Noblesse\Room\Interfaces\Direction|null
     */
    public function west(): ?Direction
    {
        return $this->west;
    }

    /**
     * 40% Enemy spawn chance
     *
     * @return boolean
     */
    public function enemySpawnChance(): bool
    {
        $chance = rand(1, 100);
        $spawn  = false;

        if ($chance <= 40) $spawn = true;
        
        return $spawn;
    }
}