<?php 

namespace Rpg;

class Guerrier extends Character
{
    public function __construct($pseudo, $tribe, $class)
    {
        parent::__construct($pseudo, $tribe, $class);

        $this->strength *= 3;

    }
}

?>