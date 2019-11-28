<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://127.0.0.1:8889");
} else {
//    readfile('static/deleteStudent.html');
}
?>

<?php


if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = 'SELECT * FROM Students WHERE NAME LIKE "%' . $search . '%"' . ' OR SURNAME LIKE "%' . $search . '%"' . ' OR FATHERNAME LIKE "%' . $search . '%"' . ' OR GRADE LIKE "%' . $search . '%"' . ' OR MOBILENUMBER LIKE "%' . $search . '%"' . ' OR BIRTHDAY LIKE "%' . $search . '%"';
//    echo $query;
    $search_result = filterTable($query);
    if ($search_result) {
//        header("Location:UserCP.php");
//        echo 'OK';
    } else {
//        echo 'not ok';
//        echo ("Could not insert data : " . mysqli_error($search_result) . " " . mysqli_errno());
    }
}

function filterTable($search)
{
    $db_host = 'db';
    $db_user = 'user';
    $db_pass = 'password';
    $db_name = 'db_test';
    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $filter_Result = mysqli_query($con, $search);
//    echo('Hello');
    return $filter_Result;
}

?>
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
    <title>Search Student</title>
</head>
<body>
<nav class="navbar navbar-light bg-danger">
    <a class="navbar-brand text-light" href="#">Search Student</a>
</nav>
<br>
<div class="container-fluid">
    <div class="jumbotron bg-dark text-light">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-sm-10">
                    <!--            <label for="id">ID</label>-->
                    <input class="form-control" id="id" type="text" name="search" placeholder="Search text" required>
                </div>
                <div class="form-group col-sm-2">
                    <button class="btn btn-primary form-control" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                        Search
                    </button>
                </div>
            </div>
        </form>

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">SURNAME</th>
                <th scope="col">FATHERNAME</th>
                <th scope="col">GRADE</th>
                <th scope="col">MOBILENUMBER</th>
                <th scope="col">BIRTHDAY</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($search) {
                while ($row = mysqli_fetch_array($search_result)):
                    ?>

                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['NAME']; ?></td>
                        <td><?php echo $row['SURNAME']; ?></td>
                        <td><?php echo $row['FATHERNAME']; ?></td>
                        <td><?php echo $row['GRADE']; ?></td>
                        <td><?php echo $row['MOBILENUMBER']; ?></td>
                        <td><?php echo $row['BIRTHDAY']; ?></td>
                    </tr>

                <?php endwhile;
            } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>