<?php 

    interface InterfaceOne {
        public function add($a, $b);
    }

    interface InterfaceTwo {
        public function sub($x, $y);
    }


    class ChildClass implements InterfaceOne, InterfaceTwo {
        public function add($a, $b){
            return $a + $b;
        }

        public function sub($x, $y){
            return $x - $y;
        }
    }


    $childClass = new ChildClass;

    // echo $childClass->add(55,88);

    echo $childClass->sub(987,521);
?>