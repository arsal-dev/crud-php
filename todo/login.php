<?php
    include './db_connect.php';

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)){
            $error = 'Please Enter Email';
        }
        elseif(empty($password)){
            $error = 'Please Enter Password';
        }
        else {
            $result = $conn->query("SELECT * FROM user WHERE email = '$email'");
            $row = $result->fetch_assoc();
            if($result->num_rows){
                if(password_verify($password, $row['password'])){
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    header('Location: ./index.php');
                }
                else {
                    $error = 'Email Or Passwrod Does Not Exist';
                }
            }
            else {
                $error = 'Email Or Passwrod Does Not Exist';
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
    <h3 class="text-center mt-5">Login</h3>
    <div class="container mt-5">
        <p class="text-danger"><?php echo $error ?? ""; ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="form-control" placeholder="password">
            </div>
            <p class="mt-3">Do not have an account? <a href="./signup.php">create</a></p>
            <input type="submit" name="submit" class="btn btn-primary mt-2">
        </form>
    </div>
</body>
</html>