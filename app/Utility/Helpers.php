<?php

namespace Noblesse\Utility;

const REGEX_DIRECTION = '/^[^a-z0-9]*([newsq])[^a-z0-9]*$/';

/**
 * Show choose character options
 *
 * @return string
 */
function showPickChar(): string {
    echo "
    Welcome to Noblesse - SUD game.
    Choose any 4 of these characters to start the game:
    Frankenstein [frank], Muzaka [muzaka], M-21 [m21], Han Shinwoo [han]\n\n";

    return readline("Choose your destiny: ");
}

/**
 * Show list of commands of the game
 *
 * @return void
 */
function showCommands(): void {
    echo "
    ---Command Options---
    [hint]      Read signboard hint
    [status]    Show character status
    [travel]    Go to the next room
    [grab]      Grab an item
    [inventory] Check storage
    [unlock]    Unlock door
    [wakeup]    WakeUp the Noblesse in the final room.
    [quit]      Quit game
    ----------------------------\n";
}

/**
 * Returns the word of 4 direction picked by the user
 *
 * @param string $directionOpt
 * @return string
 */
function returnWordDirection(string $directionOpt): string
{
    switch($directionOpt) {
        case 'n': return 'north';
        case 'e': return 'east';
        case 's': return 'south';
        case 'w': return 'west';
    }
}