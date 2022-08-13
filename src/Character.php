<?php 

namespace Rpg;

class Character
{
    public $pseudo;
    public $tribe;
    public $class;
    public $health = 100;
    protected $strength = 10;
    protected $mana = 10;
    
    public function __construct($pseudo, $tribe, $class)
    {
        $this->pseudo = $pseudo;
        $this->tribe = $tribe;
        $this->class = $class;
    }
}

?>