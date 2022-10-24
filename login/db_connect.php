<?php 

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'orange';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die($conn->connect_error);