<?php include './db_connect.php'; ?>
<?php include './insert_data.php'; ?>
<?php
    $result = $conn->query("SELECT * from users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get User</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><button class='btn btn-warning'>Edit</button>&nbsp;<button class='btn btn-danger delete' data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                    <!-- Dusra Tareeqa Delete ka! Sasta Tareeqa -->
                    <a href="./delete_data.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">DeleteNew</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        
        <div class="mt-5">
            <p class="text-danger"><?php echo $error ?? ""; ?></p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?? ""; ?>" class="form-control" placeholder="Name">
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $email ?? ""; ?>" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mt-2">
                    <label for="pass">Password</label>
                    <input type="password" id="pass" name="password" value="<?php echo $password ?? ""; ?>" class="form-control" placeholder="Password">
                </div>

                <input type="submit" name="submit" class="btn btn-primary mt-3">
            </form>
        </div>

    </div>



    <script>
        let del = document.querySelectorAll('.delete');
        for(let i = 0; i < del.length; i++){
            del[i].addEventListener('click', function(){
                let delete_id = this.getAttribute('data-id');
                let dlt_modal = document.getElementById('dlt_modal');
                dlt_modal.setAttribute('href', `./delete_data.php?id=${delete_id}`);
            });
        }
    </script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure You Want To Delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" id="dlt_modal" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>