<?php

namespace Noblesse\Room\Interfaces;

use Noblesse\Room\Room;

interface Direction
{
    public function setDirection(Room $north = NULL, Room $east = NULL, Room $south = NULL, Room $west = NULL): void;
    public function north(): ?Direction;
    public function east():  ?Direction;
    public function south(): ?Direction;
    public function west():  ?Direction;
}