<?php

namespace Noblesse\Room;

require_once __DIR__.'../../../vendor/autoload.php';

use Noblesse\Room\Room;

/**
 * This is where the Noblesse resides.
 */
class FourthRoom extends Room
{
    public function __construct(string $newName, bool $isDoorLocked = false)
    {
        parent::__construct($newName, $isDoorLocked);
    }

    public function wakeUpNoblesse(string $favoriteFood): bool
    {
        if ($favoriteFood === 'cooked ramen') return true;
        
        return false;
    }
}