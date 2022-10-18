<?php 

    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['dlt_id'];

    $conn->query("DELETE FROM users WHERE id = $id");


    echo json_encode(['code' => 200, 'data' => 'User delted successfully']);