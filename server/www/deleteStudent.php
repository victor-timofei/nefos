<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://127.0.0.1:8889");
} else {
//    readfile('static/deleteStudent.html');
}
?>

<?php

$db_host = 'db';
$db_user = 'user';
$db_pass = 'password';
$db_name = 'db_test';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $res = $con->query('DELETE FROM Students WHERE ID=' . $id);
    if ($res) {
        $toast = '<div class="alert alert-success">Deleted!</div>';
    } else {
        $toast = '<div class="alert alert-danger">Delete failed!</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <title>Delete Student</title>
</head>
<body>
<nav class="navbar navbar-light bg-danger">
    <a class="navbar-brand text-light" href="#">Delete Student</a>
</nav>
<br>
<div class="container-fluid">
    <div class="jumbotron bg-dark text-light">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-sm-2">
                    <!--                    <label for="id">ID</label>-->
                    <input class="form-control" id="id" type="text" name="id" placeholder="Enter ID" required>
                </div>
                <!--</div>
                <div class="row">-->
                <div class="form-group col-sm-2">
                    <input class="btn btn-primary form-control" type="submit" value="Delete">
                </div>
            </div>
        </form>
    </div>
</div>


<?php echo $toast; ?>
</body>
</html>
