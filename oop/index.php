<?php

    class Customers {
        public $id;
        public $name;
        public $email;
        public $phone;
        public $balance;

        public function __construct($id, $name, $email, $phone, $balance)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->balance = $balance;
        }

        public function getEmail(){
            return $this->email;
        }


        // public function __destruct()
        // {
        //     echo 'class closed!';
        // }
    }


    $customer = new Customers(1,'name2', 'john@gma3il.com', 03544564, 5000);
    $customer2 = new Customers(2,'name3', 'john@gma32il.com', 0354635464, 2000);
    $customer3 = new Customers(3,'name4', 'john@gma34il.com', 03546457, 4000);
    $customer5 = new Customers(5,'name6', 'john@gma23l.com', 878035464, 500000);


    echo $customer->getEmail();
?>