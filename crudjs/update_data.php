<?php 

    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['edit_name'];
    $email = $data['edit_email'];
    $password = $data['edit_password'];
    $id = $data['edit_id'];

    $conn->query("UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE id = $id");

    echo json_encode(['code' => 200, 'res' => 'User Updated Successfully']);