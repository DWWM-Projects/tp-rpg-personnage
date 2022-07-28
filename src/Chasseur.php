<?php 

namespace Rpg;

class Chasseur extends Character
{
    public function __construct($name, $tribe, $class)
    {
        parent::__construct($name, $tribe, $class);

        $this->strength *= 2;
        $this->mana *= 2;
    }
}

?>