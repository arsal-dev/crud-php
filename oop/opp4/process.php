<?php 

namespace loc\data\process;

class Process {
    public static $name;
    public static function setData($name){
        self::$name = $name;
        return self::$name;
    }
}