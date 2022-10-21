<?php 

    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['edit_id'];

    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    $row = $result->fetch_assoc();

    echo json_encode(['code' => 200, 'data' => $row]);