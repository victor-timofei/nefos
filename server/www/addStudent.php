<?php



session_start();

$db_host = 'db';
$db_user = 'user';
$db_pass = 'password';
$db_name = 'db_test';

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    readfile("static/addStudent.html");
    readfile("static/addStudent.css");
    readfile("static/addStudent.js");

    if ( ! empty( $_POST ) ) {
        $name = $_POST['firstname'];
        $surname = $_POST['lastname'];
        $fathername = $_POST['fathername'];
        $grade = $_POST['grade'];
        $mobile = $_POST['mobile'];
        $birthday = $_POST['birthday'];
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->query("INSERT INTO Students (NAME, SURNAME, FATHERNAME, GRADE, MOBILENUMBER, BIRTHDAY ) VALUES ('$name', '$surname', '$fathername', '$grade', '$mobile', '$birthday')") or
                        die($con->error);
//        $stmt->bind_param('s', $_POST['username']);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        $user = $result->fetch_object();
    }

} else {
    // Redirect them to the login page
    header("Location: http://127.0.0.1:8889");
}
?>

