<?php

namespace Noblesse\Room\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Room\Room;
use Noblesse\Room\FourthRoom;

/**
 * This is where the setting of Main character rooms
 */
class RoomSetting
{

    /**
     * Frankenstein's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function setFrankRoom(): Room
    {
        $room1 = new Room('Upper Main Floor');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Bedroom');
        $room4 = new FourthRoom('Balcony', true);

        $room1->items = ['chopsticks'];
        $room2->items = ['coffemug', 'ramen'];
        $room3->items = ['bowl'];

        $room1->attachRoom('east', $room2);
        $room1->attachRoom('south', $room3);
        $room1->attachRoom('west', $room4);

        $room1->dialogue = "\tThe lower room is sealed I need to find another way around here.\n";
        $room2->dialogue = "\tHmmm, weird why is this place so clean and almost like someone prepared some food.\n";
        $room3->dialogue = "\tGot to find a clue around here somewhere.\n";
        $room4->dialogue = "\tWhy he is so familiar to me...\n";
         
        return $room1;
    }

    /**
     * Muzaka's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function setMuzakaRoom(): Room
    {
        $room1 = new Room('Basement');
        $room2 = new Room('Kitchen');
        $room3 = new Room('Great Hall', true);
        $room4 = new FourthRoom('Vault', true);

        $room1->items = ['chopsticks', 'ramen'];
        $room2->items = ['teapot', 'bowl'];
        $room3->items = ['picture'];

        $room1->attachRoom('east', $room3);
        $room1->attachRoom('west', $room2);

        $room4->attachRoom('north', $room3);

        $room1->dialogue = "\tGot to find that guy. Wait why is there so many ramen packs here?\n";
        $room2->dialogue = "\tWhy did he leave this place unattended. Better clean this for a while.\n";
        $room3->dialogue = "\tOhh he really does have a bad taste when it comes to art haha!\n";
        $room4->dialogue = "\tWhat happened to you, Raizel!?\n";
        
        return $room1;
    }

    /**
     * Han Shinwoo's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function setHanRoom(): Room
    {
        $room1 = new Room('Lower Main Hall');
        $room2 = new Room('Dining Room');
        $room3 = new Room('Secret Room', true);
        $room4 = new FourthRoom('Drawing Room', true);

        $room1->items = ['teapot'];
        $room2->items = ['bowl', 'ramen'];
        $room3->items = ['chopsticks'];

        $room1->attachRoom('east', $room2);
        $room1->attachRoom('south', $room4);

        $room3->attachRoom('west', $room2);

        $room1->dialogue = "\tAhh I need to compose myself first. I need to escape here.\n";
        $room2->dialogue = "\tWhat the..? This place is dazzling. Hello? anybody there?\n";
        $room3->dialogue = "\tThere must be a way out in here.\n";
        $room4->dialogue = "\tSo this is the guy in my dream. He's so pale\n";
        
        return $room1;
    }

    /**
     * M-21's room setting
     *
     * @return \Noblesse\Room\Room
     */
    public static function setM21Room(): Room
    {
        $room1 = new Room('Entrance Hall');
        $room2 = new Room('Gallery');
        $room3 = new Room('Rest Room');
        $room4 = new FourthRoom('Drawing Room', true);

        $room1->items = ['bowl'];
        $room2->items = ['chopsticks'];
        $room3->items = ['ramen', 'coffemug'];

        $room2->attachRoom('north', $room4);
        $room2->attachRoom('west', $room1);
        $room2->attachRoom('south', $room3);
        
        $room1->dialogue = "\tWhen did fell asleep in here?\n";
        $room2->dialogue = "\tThis is the guy in my dreams. Maybe he has something for me.\n";
        $room3->dialogue = "\tThis place don't really seemed abondened, everthing here is tidy.\n";
        $room4->dialogue = "\tMaybe I need something to wake him up\n";

        return $room1;
    }
}