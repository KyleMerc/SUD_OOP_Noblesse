<?php

require_once __DIR__.'/vendor/autoload.php';

use Noblesse\Character\Factory\CharacterFactory as CharMake;
use Noblesse\Utility\CharUtil as Char;
use Noblesse\Room\Factory\RoomFactory as Room;
use Noblesse\Utility\RoomMovement;

use function Noblesse\Utility\{showPickChar, showCommands};

while (true) {
    $pickChar = showPickChar();

    if (CharMake::makeMainCharacter($pickChar) === NULL) continue; 

    $mainChar = CharMake::makeMainCharacter($pickChar);
    $room     = new RoomMovement(Room::setUpCharRoom($pickChar));
    break;
}

function func_name(Type $args): void {
    # code...
}
while(true) {
    echo "\nTo know which command, type [help]\n";
    $optCmd = readline("Enter a command: ");

    if ($optCmd === 'quit') {
        echo "\nGoodbye!!\n";
        break;
    }

    switch ($optCmd) {
        case 'help':
            showCommands();
            break;
        case 'status':
            Char::getStatus($mainChar);
            break;
        case 'hint':
            echo $room->currentRoom;
            break;
        case 'travel':
            $room->showRoomMenu($mainChar);
            break;
        case 'grab':
            $mainChar->grab($room->currentRoom->items);
            break;
        case 'inventory':
            $mainChar->showInventory();
            break;
        case 'unlock':
            $mainChar->unlockNextRoom($room->currentRoom);
            break;
        case 'wakeup':
            break;
        default:
            echo "\nInvalid command...\n";
    }
}
