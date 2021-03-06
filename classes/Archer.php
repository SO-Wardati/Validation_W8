<?php

class Archer extends Character
{
    private $quiver = 10;
    public $specialAttack = false;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function turn($target)
    {
        $round = rand(1, 100);
        if ($this->quiver == 0) {
            return $this->dagger($target);
        } else if ($round <= 30) {
            return $this->specialAttack($target);
        } else if ($round == $this->specialAttack) {
            return $this->doubleArrow($target);
        } else {
            return $this->arrow($target);
        }
    }


    public function arrow($target)
    {
        $cost = rand(1, 10);
        if ($cost > 1) {
            $cost = 1;
            $arrowDamage = $this->damage;
            $this->quiver -= $cost;
            $target->setHealthPoints($arrowDamage);
            $status = "$this->name lance une flèche sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
            return $status;
        }
    }

    public function doubleArrow($target)
    {
        $cost = rand(1, 10);
        $cost = rand(1, 10);
        if ($cost > 2) {
            $cost = 2;
            $arrowDamage = $cost * rand(15, 30) / 10;
            $this->quiver -= $cost;
            $target->setHealthPoints($arrowDamage);
            $status = "$this->name lance deux flèches sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
            return $status;
        }
    }

    public function dagger($target)
    {
        $target->setHealthPoints($this->damage);
        $status = "$this->name n'a plus de flèche et donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
    public function specialAttack()
    {
        if ($this->specialAttack == false) {
            $this->specialAttack = true;
            $status = "$this->name se prépare à lancer deux flèches !";
            return $status;
        }
        $this->specialAttack = false;
    }

    public function setHealthPoints($damage)
    {
        $this->healthPoints -= round($damage);
        $this->isAlive();
        return;
    }
}
