<?php

namespace Noblesse\Room\Factory;

interface RoomSetting
{
    const ROOM_NAMESPACE = __CLASS__ . "::";

    const FRANK_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Upper Main Floor',
            'isLocked'  => false,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThe lower room is sealed I need to find another way around here.\n"
        ],
        'room2' => [
            'name'      => 'Kitchen',
            'isLocked'  => false,
            'items'     => ['coffeemug', 'ramen'],
            'dialogue'  => "\tHmmm, weird why is this place so clean and almost like someone prepared some food.\n"
        ],
        'room3' => [
            'name'      => 'Bedroom',
            'isLocked'  => false,
            'items'     => ['bowl'],
            'dialogue'  => "\tGot to find a clue around here somewhere.\n"
        ],
        'room4' => [
            'name'      => 'Balcony',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tWhy he is so familiar to me...\n"
        ],
    ];

    const MUZAKA_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Basement',
            'isLocked'  => false,
            'items'     => ['chopsticks', 'ramen'],
            'dialogue'  => "\tGot to find that guy. Wait why is there so many ramen packs here?\n"
        ],
        'room2' => [
            'name'      => 'Kitchen',
            'isLocked'  => false,
            'items'     => ['teapot', 'bowl'],
            'dialogue'  => "\tWhy did he leave this place unattended. Better clean this for a while.\n"
        ],
        'room3' => [
            'name'      => 'Great Hall',
            'isLocked'  => true,
            'items'     => ['picture'],
            'dialogue'  => "\tOhh he really does have a bad taste when it comes to art haha!\n"
        ],
        'room4' => [
            'name'      => 'Vault',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tWhat happened to you, Raizel!?\n"
        ],
    ];

    const HAN_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Lower Main Hall',
            'isLocked'  => false,
            'items'     => ['teapot'],
            'dialogue'  => "\tAhh I need to compose myself first. I need to escape here.\n"
        ],
        'room2' => [
            'name'      => 'Dining Room',
            'isLocked'  => false,
            'items'     => ['bowl', 'ramen'],
            'dialogue'  => "\tWhat the..? This place is dazzling. Hello? anybody there?\n"
        ],
        'room3' => [
            'name'      => 'Secret Room',
            'isLocked'  => true,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThere must be a way out in here.\n"
        ],
        'room4' => [
            'name'      => 'Drawing Room',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tSo this is the guy in my dream. He's so pale\n"
        ],
    ];

    const M21_ROOM_SETTING = [
        'room1' => [
            'name'      => 'Entrance Hall',
            'isLocked'  => false,
            'items'     => ['bowl'],
            'dialogue'  => "\tWhen did fell asleep in here?\n"
        ],
        'room2' => [
            'name'      => 'Gallery',
            'isLocked'  => false,
            'items'     => ['chopsticks'],
            'dialogue'  => "\tThis is the guy in my dreams. Maybe he has something for me.\n"
        ],
        'room3' => [
            'name'      => 'Rest Room',
            'isLocked'  => false,
            'items'     => ['ramen', 'coffeemug'],
            'dialogue'  => "\tThis place don't really seemed abondened, everthing here is tidy.\n"
        ],
        'room4' => [
            'name'      => 'Drawing Room',
            'isLocked'  => true,
            'items'     => [],
            'dialogue'  => "\tMaybe I need something to wake him up\n"
        ],
    ];
}