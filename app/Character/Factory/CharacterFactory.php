<?php

namespace Noblesse\Character\Factory;

require_once __DIR__.'../../../../vendor/autoload.php';

use Noblesse\Character\Factory\CharacterSetting as CharSetting;

class CharacterFactory
{
    /**
     * Returns the creation of character
     *
     * @param string $charType
     * @return Character|MainCharacter
     */
    public static function makeCharacter(string $charType)
    {
        if (method_exists(CharSetting::class, $charType)) {
            return CharSetting::$charType();
        } else {
            return NULL;
        }
    }
}