<?php

    abstract class parentClass {

        protected $x;
        protected $y;
        protected $addi;
        
        public function __construct($x, $y)
        {
            $this->x = $x;
            $this->y = $y;

            $this->addi = $this->x - $this->y;
        }

        abstract protected function add($a, $b);
    }


    class childClass extends parentClass {

        public function subtraction(){
            return $this->addi;
        }


        public function add($b, $a){
            return $a + $b;
        }
    }

    $childClass = new childClass(88,21);

    echo 'addition: ' . $childClass->add(22,88);
    echo '<br>';
    echo 'sub: ' . $childClass->subtraction();
?>