<?php

    include './db_connect.php';

    $result = $conn->query("SELECT * FROM users");


    $data = [];
    while($row = $result->fetch_assoc()){
        array_push($data, $row);
    }


    echo json_encode(['code' => 200, 'data' => $data]);