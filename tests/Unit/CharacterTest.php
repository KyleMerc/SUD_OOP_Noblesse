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

    /**
     *  @test
     *  @doesNotPerformAssertions
    */
    public function main_character_can_grab_and_show_items(): void
    {
        $character = Char::simpleModifiedHuman();
        $items = ['bowl', 'ramen'];

        $character->grab($items);
        $character->showInventory();
        $character->grab(['chopsticks']);
        $character->grab(['chopsticks']);
        $character->showInventory();
    }

    
}