<?php 

namespace Rpg;

class Character
{
    protected $name;
    protected $tribe;
    protected $class;
    protected $health = 100;
    protected $strength = 10;
    protected $mana = 10;
    
    public function __construct($name, $tribe, $class)
    {
        $this->name = $name;
        $this->tribe = $tribe;
        $this->class = $class;
    }
}

?>