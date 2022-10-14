<?php 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        if(empty($name)){
            $error = 'Please Enter Name';
        }
        elseif(empty($email)) {
            $error = 'Please Enter Email';
        }
        elseif(empty($password)) {
            $error = 'Please Enter Password';
        }
        else {

            $error = '';

            $conn->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
    
            if($conn->error){
                echo $conn->error;
            }
            else {
                $name = '';
                $email = '';
                $password = '';
            }
        }

    }