<?php

namespace Noblesse\Character;

class Character
{
    private $name;
    private $charType;
    private $weaponType;
    private $health;
    private $damage;


    /**
     * Setting for default Character
     *
     * @param string $defaultName
     * @param string $newCharType
     * @param string $newWeaponType
     */
    public function __construct(string $defaultName, string $newCharType, string $newWeaponType)
    {
        $this->name         = $defaultName;
        $this->charType     = $newCharType;
        $this->weaponType   = $newWeaponType;
        $this->health       = 100;
    }

    public function __set($property, $value): void
    {
        if (property_exists($this, $property))
            $this->$property = $value;
        else
            echo "\nProperty not found\n";
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function getDamage(): int
    {
        return rand($this->damage[0], $this->damage[1]);
    }

    /**
     * This is used for attack method.
     * Sets the current health after the attack.
     *
     * @param integer $damage
     * @return void
     */
    private function damageHealth(int $damage): void
    {
        $this->health -= $damage;

        if ($this->health <= 0) $this->health = 0;
    }

    /**
     * Attack method for character.
     * It displays who attacks and number of dealt damage.
     *
     * @param Character $character
     * @return void
     */
    public function attack(Character $character): void
    {
        $damage = $this->getDamage();
        $character->damageHealth($damage);

        echo "\n\t    {$this->name} deals {$damage} damage\n";
    }
}
