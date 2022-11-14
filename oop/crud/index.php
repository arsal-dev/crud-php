<?php 
    include './database.php';

    $database = new Database();

    // $data = $database->insertData('users', '`name`, `email`, `phone`', "'Aness', 'anees@gmail.com', 035468463");

    // $database->deleteData('users', 'where id = 3');

    $data = $database->getData('users');
    
    echo '<pre>';
    print_r($data);