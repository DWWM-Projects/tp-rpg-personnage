<?php 

namespace Rpg;

class Guerrier extends Character
{
    public function __construct($name, $tribe, $class)
    {
        parent::__construct($name, $tribe, $class);

        $this->strength *= 3;
        
    }
}

?>