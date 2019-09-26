<?php

use PHPUnit\Framework\TestCase;
use Noblesse\Character\Factory\CharacterFactory as Char;

class CharacterTest extends TestCase
{
    /** @test */
    public function can_create_character(): void
    {
        $character = Char::makeMainCharacter('frank');
        $enemy     = Char::makeEnemyCharacter('Vampire');
        
        $this->assertInstanceOf(\Noblesse\Character\Character::class, $enemy);
        $this->assertInstanceOf(\Noblesse\Character\MainCharacter::class, $character);
    }

    /** @test */
    public function character_health_decreased(): void
    {
        $character = Char::makeMainCharacter('han');
        $enemy     = Char::makeEnemyCharacter('vampire');

        $character->attack($enemy);
        $enemy->attack($character);

        \Noblesse\Character\Utility\CharUtil::status($character);
        \Noblesse\Character\Utility\CharUtil::status($enemy);

        $this->assertLessThan(100, $character->health);
        $this->assertLessThan(100, $enemy->health);
    }

    /**
     *  @test
     *  @doesNotPerformAssertions
    */
    public function main_character_can_grab_and_show_items(): void
    {
        $character = Char::makeMainCharacter('m21');
        $items = ['bowl', 'ramen'];

        $character->grab($items);
        $character->showInventory();
        $character->grab(['chopsticks']);
        $character->grab(['chopsticks']);
        $character->showInventory();
    }
}