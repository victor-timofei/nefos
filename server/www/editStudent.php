<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://127.0.0.1:8889");
} else {
//    readfile('static/editStudent.html');

    if (isset($_POST['id'])) {

        $edit = 'UPDATE Students SET NAME="' . $_POST['firstname'] . '", SURNAME="' . $_POST['lastname'] . '", FATHERNAME="' . $_POST['fathername'] . '", GRADE=' . $_POST['grade'] . ',MOBILENUMBER="' . $_POST['mobile'] . '", BIRTHDAY="' . $_POST['birthday'] . '" WHERE ID=' . $_POST['id'];
//    echo $edit;
        $db_host = 'db';
        $db_user = 'user';
        $db_pass = 'password';
        $db_name = 'db_test';
//    $toast_fail = '<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;"><div class="toast" style="position: absolute; top: 0; right: 0;"><div class="toast-header"><img src="" class="rounded mr-2" alt="..."><strong class="mr-auto">Students edit</strong><small>Just now</small><button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="toast-body">Update failed!</div></div></div>';

        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $filter_Result = $con->query($edit);

        if (!$filter_Result) {
            $toast = '<div class="alert alert-danger">Update failed!</div>';
        } else {
            $toast = '<div class="alert alert-success">Updated!</div>';
        }


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
    <title>Edit Student</title>
</head>
<body>
<body>
<nav class="navbar navbar-light bg-danger">
    <a class="navbar-brand text-light" href="#">Edit Student</a>
</nav>
<br>

<div class="container-fluid">
    <div class="jumbotron bg-dark text-light">
        <!--<div class="page-header">
            <h2>Edit Student Form</h2>
        </div>
        <br>-->
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-sm-3">
                    <label for="id">ID</label>
                    <input id="id" class="form-control" type="text" name="id" placeholder="Enter ID" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm">
                    <label for="fname">First Name</label>
                    <input id="fname" class="form-control" type="text" name="firstname" placeholder="Enter First Name"
                           required>
                </div>
                <div class="form-group col-sm">
                    <label for="lname">Last Name</label>
                    <input id="lname" class="form-control" type="text" name="lastname" placeholder="Enter Last Name"
                           required>
                </div>
                <div class="form-group col-sm">
                    <label for="faname">Father Name</label>
                    <input id="faname" class="form-control" type="text" name="fathername"
                           placeholder="Enter Father Name" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm">
                    <label for="grade">Grade</label>
                    <input id="grade" class="form-control" type="text" name="grade" placeholder="Enter Grade" required>
                </div>
                <div class="form-group col-sm">
                    <label for="mobile">Mobile Number</label>
                    <input id="mobile" class="form-control" type="text" name="mobile" placeholder="Enter mobile number"
                           required>
                </div>
                <div class="form-group col-sm">
                    <label for="bday">Birthday</label>
                    <input id="bday" class="form-control" type="text" name="birthday" placeholder="Enter birthday"
                           required>
                    <small id="birthdayHelp" class="form-text text-muted">Date format (yyyy-mm-dd)</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm">
                    <input class="btn btn-primary form-control" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $toast; ?>
</body>
</html>
