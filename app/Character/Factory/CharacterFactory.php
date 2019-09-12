<?php

namespace Noblesse\Character\Factory;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use Noblesse\Character\Character;
use Noblesse\Character\MainCharacter;

abstract class CharacterFactory
{

    /**
     * Frankenstein's setting
     *
     * @return MainCharacter
     */
    public static function SuperModifiedHuman(): MainCharacter
    {
        $frank          = new MainCharacter('Frankenstein', 'Super Modified Human', 'Dark Spear');
        $frank->damage  = [30, 50];
    
        return $frank;
    }
    
    /**
     * M-21's setting
     *
     * @return MainCharacter
     */
    public static function SimpleModifiedHuman(): MainCharacter
    {
        $m21            = new MainCharacter('M-21', 'Simple Mofidied Human', 'Gun');
        $m21->damage    = [25, 30];

        return $m21;
    }

    /**
     * Muzaka's setting
     *
     * @return MainCharacter
     */
    public static function Werewolf(): MainCharacter
    {
        $muzaka         = new MainCharacter('Muzaka', 'Werewolf', 'Strong Punch');
        $muzaka->damage = [25, 45];

        return $muzaka;
    }

    /**
     * Han Shinwoo's setting
     *
     * @return MainCharacter
     */
    public static function Human(): MainCharacter
    {
        $han            = new MainCharacter('Han Shinwoo', 'Human', 'Karate');
        $han->damage    = [40, 45];

        return $han;
    }

    /**
     * Enemy vampire's setting
     *
     * @return Character
     */
    public static function enemyVampire(): Character
    {
        $vampire         = new Character('Nameless', 'Vampire', 'Claws');
        $vampire->damage = [1, 10];

        return $vampire;
    }

    /**
     * The noblesse will turn into a boss if the given items are missing.
     *
     * @return Character
     */
    public static function enemyBoss(): Character
    {
        $noblesse           = new Character('Raizel', 'Vampire Noble', 'Blood Magic');
        $noblesse->health   = 150;
        $noblesse->damage   = [30, 50];

        return $noblesse;
    }
}
