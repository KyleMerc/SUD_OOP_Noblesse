<?php

namespace Noblesse\Character\Factory;

class MainCharacterSetting
{
    const FRANK_SETTING = [
        'name'          => 'Frankenstein',
        'charType'      => 'SuperModifiedHuman',
        'weaponType'    => 'Dark Spear',
        'damage'        => [30, 50]
    ];

    const MUZAKA_SETTING = [
        'name'          => 'Muzaka',
        'charType'      => 'Werewolf',
        'weaponType'    => 'Strong Punch',
        'damage'        => [25, 45]
    ];

    const M21_SETTING = [
        'name'          => 'M-21',
        'charType'      => 'SimpleModifiedHuman',
        'weaponType'    => 'Gun',
        'damage'        => [25, 30]
    ];

    const HAN_SETTING = [
        'name'          => 'Han Shinwoo',
        'charType'      => 'Human',
        'weaponType'    => 'Karate',
        'damage'        => [40, 45]
    ];
}

// $char = "Noblesse\Character\Factory\MainCharacterSetting::FRANK";

// var_dump(constant($char."_SETTING"));