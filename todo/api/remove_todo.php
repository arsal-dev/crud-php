<?php 
    include '../db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];

    $conn->query("DELETE FROM todos WHERE id = '$id'");

    echo json_encode(['code' => 200, 'data' => 'Todo Deleted Successfully']);