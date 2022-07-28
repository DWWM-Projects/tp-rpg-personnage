<?php 

namespace Rpg;

class Mage extends Character
{
    public function __construct($name, $tribe, $class)
    {
        parent::__construct($name, $tribe, $class);

        $this->mana *= 3;
    }
}

?>