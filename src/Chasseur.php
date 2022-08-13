<?php 

namespace Rpg;

class Chasseur extends Character
{

    
    public function __construct($pseudo, $tribe, $class)
    {
        parent::__construct($pseudo, $tribe, $class);

        $this->strength *= 2;
        $this->mana *= 2;
    }
}

?>