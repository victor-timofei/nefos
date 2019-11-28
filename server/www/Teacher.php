<?php

session_start();
if (isset($_SESSION['user_id'])) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    readfile('static/teacher.html');
    readfile("static/teacher.css");
    readfile("static/teacher.js");
} else {
    // Redirect them to the login page
    header("Location: http://127.0.0.1:8889");
}
?>

