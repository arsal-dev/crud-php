<?php
    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];

    $conn->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')");

    echo json_encode(['code' => 200, 'res' => 'User Added Successfully']);