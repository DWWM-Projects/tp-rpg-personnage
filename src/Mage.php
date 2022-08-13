<?php 

namespace Rpg;

class Mage extends Character
{
    public function __construct($pseudo, $tribe, $class)
    {
        parent::__construct($pseudo, $tribe, $class);

        $this->mana *= 3;
    }
}

?>