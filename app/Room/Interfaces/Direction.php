<?php

namespace Noblesse\Room\Interfaces;

use Noblesse\Room\Room;

interface Direction
{
    public function attachRoom(string $direction, Room $room): void;
}