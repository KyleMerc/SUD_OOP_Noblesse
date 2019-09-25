<?php

namespace Noblesse\Utility;

function showPickChar(): string {
    echo "
    Welcome to Noblesse - SUD game.
    Choose any 4 of these characters to start the game:
    Frankenstein [frank], Muzaka [muzaka], M-21 [m21], Han Shinwoo [han]\n\n";

    return readline("Choose your destiny: ");
}

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