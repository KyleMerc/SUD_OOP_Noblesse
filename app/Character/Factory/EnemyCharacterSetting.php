<?php

namespace Noblesse\Character\Factory;

interface EnemyCharacterSetting
{
    const VAMPIRE_SETTING = [
        'name'          => 'Nameless',
        'charType'      => 'Vampire',
        'weaponType'    => 'Sharp Claws',
        'damage'        => [1, 10]
    ];

    const BOSS_SETTING = [
        'name'          => 'Raizel',
        'charType'      => 'Vampire Noble',
        'weaponType'    => 'Blood Magic',
        'damage'        => [30, 50],
    ];
}