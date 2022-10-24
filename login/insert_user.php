<?php 
        session_start();
        if(!isset($_SESSION['name'])){
            header('Location: ./index.php');
        }


        include './db_connect.php';
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];


            if(empty($name)){
                $error = 'Please Enter Name';
            }
            elseif(empty($password)){
                $error = 'Please Enter Password';
            }
            elseif(empty($cpassword)){
                $error = 'Please Enter Confirm Password';
            }
            elseif($password != $cpassword){
                $error = 'Password and Confirm Password Do Not Match';
            }
            else {
                $result = $conn->query("SELECT * FROM `login` WHERE `username` = '$name'");

                if($result->num_rows){
                    $error = 'Username Already Exists';
                }
                else {
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    
                    $conn->query("INSERT INTO `login`(`username`, `password`) VALUES ('$name','$hashed_pass')");
    
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
    <title>login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <h3 class="text-center">Add User</h3>
    <div class="container row justify-content-between mt-5">
        <div class="name"><?php echo "Welcome: ". $_SESSION['name']; ?></div>
        <div class="btn"><a href="./logout.php" class="btn btn-danger">Logout</a></div>
    </div>
    <div class="container mt-5">
        <p class="text-danger"><?php echo $error ?? "" ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" value="<?php echo $name ?? ""; ?>" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" class="form-control" value="<?php echo $password ?? ""; ?>" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="text" id="password" value="<?php echo $cpassword ?? ""; ?>" class="form-control" name="cpassword" placeholder="Enter Password">
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>