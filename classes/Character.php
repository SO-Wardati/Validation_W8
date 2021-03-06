<?php

abstract class Character

{
    public $healthPoints = 100;
    public $damage = 15;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function isAlive()
    {
        if ($this->healthPoints <= 0) {
            $this->healthPoints = 0;
            return false;
        } else {
            return true;
        }
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function setHealthPoints($damage)
    {
        $this->healthPoints -= round($damage);
        $this->isAlive();
        return;
    }
}
