<?php

namespace Noblesse\Character\Factory;

require_once $_SERVER['DOCUMENT_ROOT'] .'vendor/autoload.php';

use Noblesse\Character\Character;
use Noblesse\Character\MainCharacter;

class CharacterSetting
{
    /**
     * Frankenstein's setting
     *
     * @return MainCharacter
     */
    public static function setFrankMainChar(): MainCharacter
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
    public static function setM21MainChar(): MainCharacter
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
    public static function setMuzakaMainChar(): MainCharacter
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
    public static function setHanMainChar(): MainCharacter
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
    public static function setEnemyVampire(): Character
    {
        $vampire         = new Character('Nameless', 'Vampire', 'Claws');
        $vampire->damage = [1, 10];
        $vampire->health = rand(40, 50);

        return $vampire;
    }

    /**
     * The noblesse will turn into a boss if the given items are missing.
     *
     * @return Character
     */
    public static function setEnemyBoss(): Character
    {
        $noblesse           = new Character('Raizel', 'Vampire Noble', 'Blood Magic');
        $noblesse->health   = 150;
        $noblesse->damage   = [30, 50];

        return $noblesse;
    }
}
