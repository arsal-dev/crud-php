<?php 
    // class Base {
    //     public $name;
    //     public $age;


    //     public function __construct($name, $age)
    //     {
    //         $this->name = $name;
    //         $this->age = $age;
    //     }

    //     public function showData(){
    //         echo 'Base Data <br>';
    //         echo "Name: $this->name <br>";
    //         echo "Age: $this->age";
    //     }
    // }


    // class Drived extends Base {
    //     public function showData(){
    //         echo 'Drived Data <br>';
    //         echo "Name: $this->name <br>";
    //         echo "Age: $this->age";
    //     }
    // }

    // $person = new Base('john', 30);
    // $person->showData();


    
    class Orders {
        protected $product;
        protected $price;
        protected $qty;
        protected $total;

        public function __construct($product, $price, $qty)
        {
            $this->product = $product;
            $this->price = $price;
            $this->qty = $qty;
            $this->total = $this->qty * $this->price;
        }


        public function process(){
            echo 'Product Desc <br>';
            echo "Product: $this->product <br>";
            echo "Price: $this->price <br>";
            echo "Qty: $this->qty <br>";
            echo "Total: $this->total";
        }
    }

    class Vouchers extends Orders {
        public $disc = 200;

        public function process(){
            $this->total = $this->total - $this->disc;
            echo 'Product Desc <br>';
            echo "Product: $this->product <br>";
            echo "Price: $this->price <br>";
            echo "Qty: $this->qty <br>";
            echo "Voucher Disc: $this->disc <br>";
            echo "Total: $this->total";
        }
    }


    // $order = new Vouchers('soap', 800, 200);
    // $order->process();


    $order = new Vouchers('soap', 800, 200);
    // $order->qty = 1;

    $order->process();
?>