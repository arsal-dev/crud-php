<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'todo';


    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if($conn->connect_errno){
        echo $conn->connect_error;
    }
?>