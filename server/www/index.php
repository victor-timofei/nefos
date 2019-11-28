<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: http://127.0.0.1:8889/Teacher.php");
}
$db_host = 'db';
$db_user = 'user';
$db_pass = 'password';
$db_name = 'db_test';


if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Getting submitted user data from database
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM Teachers WHERE USERNAME = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();
//        return $user;
        // Verify user password and set $_SESSION

        if (password_verify($_POST['PASSWORD'], $user->password)) {
            $_SESSION['user_id'] = $_POST['username'];
//            echo "Logged in!";
            header("Location:Teacher.php");
        } else {
            echo 'Wrong password';
        }
    }
}
readfile("static/index.html");
readfile("static/index.css");
readfile("static/index.js");
function password_verify($post_pass, $db_pass)
{
    return $post_pass == $db_pass;
}

?>