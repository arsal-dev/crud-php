<?php include './includes/header.php'; ?>
<?php 

    include './db_connect.php';

    $id = $_SESSION['id'];

    $result = $conn->query("SELECT * FROM user WHERE id = '$id'");
    $result = $result->fetch_assoc();
?>
    <div class="container mt-5">
        <h3>Welcome: <?php echo $result['name'] ?></h3>
        <form id="submit-todo">
            <input type="text" id="todo" class="form-control" placeholder="Enter Todo">
        </form>
        <ul id="todos" class="todos mt-4"></ul>
    </div>

<script src="./js/todos.js"></script>
<?php include './includes/footer.php'; ?>