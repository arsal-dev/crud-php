<?php 
    include '../db_connect.php';
    session_start();

    $data = json_decode(file_get_contents('php://input'), true);

    $todo = $data['todo'];
    $id = $_SESSION['id'];


    $conn->query("INSERT INTO `todos`(`user_id`, `todo`) VALUES ('$id','$todo')");

    echo json_encode(['code' => 200, "data" => 'Todo Added Successfully']);
