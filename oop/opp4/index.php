<?php

    // class Base {
    //     public static $name;

    //     public static function setName($n){
    //         self::$name = $n;
    //     }
    // }

    // class Drived extends Base {
    //     public static function showName(){
    //         return parent::$name;
    //     }
    // }

    // Base::setName('John');
    // echo Drived::showName();


    // trait Trait_Ka_Naam {
    //     public function showData($name, $course){
    //         echo '<h1>Data</h1>' . "\n";
    //         echo "name: $name" . "<br>";
    //         echo "Course: $course" . "<br>";
    //         echo 'Data End!';
    //     }
    // }

    // class drived {
    //     use Trait_Ka_Naam;
    // }

    // class drived2 {
    //     use Trait_Ka_Naam;
    // }


    // $drived = new drived;
    // $drived->showData('Bohr', 'Graphic Designing');

    // echo '<br>';

    // $drived2 = new drived2;
    // $drived2->showData('Waqar Zaka', 'Trimer Lao');


    require 'process.php';
    require 'process2.php';


    use loc\data\process as pro;
    use loc\data\process2 as pro2;


    echo pro\Process::setData('John');

    echo '<br>';

    pro2\Process::showData();
?>