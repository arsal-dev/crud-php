<?php
    include '../db_connect.php';
    session_start();

    $id = $_SESSION['id'];

    $result = $conn->query("SELECT * FROM todos WHERE user_id = '$id'");

    $arr = [];
    while($row = $result->fetch_assoc()){
        array_push($arr, $row);
    }

    echo json_encode(["code" => 200, "data" => $arr]);