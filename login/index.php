<?php 

    include './db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        if(empty($name)){
            $error = 'please Enter Name';
        }
        elseif(empty($password)){
            $error = 'Please Enter Password';
        }
        else {
            $result = $conn->query("SELECT * FROM `login` WHERE `username` = '$name'");
            $user = $result->fetch_assoc();
            if($result->num_rows){
                if(password_verify($password, $user['password'])){
                    session_start();
                    $_SESSION['name'] = $name;
                    header('Location: ./insert_user.php');
                }
                else {
                    $error = 'Your Username Or Password is Wrong';
                }
            }
            else {
                $error = 'Your Username Or Password is Wrong';
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
    <h3 class="text-center">Login</h3>
    <div class="container mt-5">
        <p class="text-danger"><?php echo $error ?? "" ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" value="<?php echo $name ?? ""; ?>" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <input type="submit" name="submit" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>