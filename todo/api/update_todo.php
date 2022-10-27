<?php 
    include '../db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $newVal = $data['newVal'];
    $id = $data['id'];

    $conn->query("UPDATE `todos` SET `todo`='$newVal' WHERE id = '$id'");

    echo json_encode(['code' => 200, 'data' => 'Todo Updated Successfully']);