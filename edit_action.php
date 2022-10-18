<?php

    include './db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];


        $conn->query("UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password' WHERE id = $id");

        header('Location: ./index.php');
    }
