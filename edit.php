<?php 
    include './db_connect.php';

    $id = $_GET['id'];
    $result = $conn->query("SELECT name, email, password FROM users WHERE id = $id");
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <form action="./edit_action.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name">
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email">
            </div>
            <div class="form-group mt-2">
                <label for="pass">Password</label>
                <input type="text" id="pass" name="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Password">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
    
            <input type="submit" name="submit" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>