<?php 

    include './db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if(empty($name)){
            $error = 'Please Enter Your Name';
        }
        elseif(empty($email)){
            $error = 'Please Enter Your Email';
        }
        elseif(empty($password)){
            $error = 'Please Enter New Password';
        }
        elseif(empty($cpassword)){
            $error = 'Please Enter Confirm Password';
        }
        elseif(strlen($password) < 8){
            $error = 'Password must be grater then 8';
        }
        elseif($password != $cpassword){
            $error = 'Password and Confirm Password Do Not Match';
        }
        else {
            $result = $conn->query("SELECT * FROM user WHERE email = '$email'");
            if($result->num_rows){
                $error = 'Email Already Exists';
            }
            else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $conn->query("INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$password_hash')");

                echo '<p class="text-success">User Added Successfully!</p>';
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Todo</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <h3 class="text-center mt-5">Signup</h3>
    <div class="container mt-5">
        <p class="text-danger"><?php echo $error ?? ""; ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name ?? "" ?>" class="form-control" placeholder="name">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email ?? "" ?>" class="form-control" placeholder="email">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control" placeholder="password">
            </div>
            <div class="form-group mt-2">
                <label for="cpassword">Confirm Password</label>
                <input type="text" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm password">
            </div>
            <p class="mt-3">Already have an account? <a href="./login.php">login</a></p>
            <input type="submit" name="submit" class="btn btn-primary mt-2">
        </form>
    </div>
</body>
</html>