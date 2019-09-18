<?php

use PHPUnit\Framework\TestCase;
use Noblesse\Character\Factory\CharacterFactory as Char;

class CharacterTest extends TestCase
{
    /** @test */
    public function can_create_character(): void
    {
        $character = Char::human();

        $this->assertInstanceOf(\Noblesse\Character\Character::class, $character);
        $this->assertInstanceOf(\Noblesse\Character\MainCharacter::class, $character);
    }

    /** @test */
    public function character_health_decreased(): void
    {
        $character = Char::superModifiedHuman();
        $enemy     = Char::enemyVampire();

        $character->attack($enemy);
        $enemy->attack($character);

        $this->assertLessThan(100, $character->health);
        $this->assertLessThan(100, $enemy->health);
    }

    
}