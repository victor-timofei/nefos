<?php

$db_host = 'db';
$db_user = 'user';
$db_pass = 'password';
$db_name = 'db_test';

if (isset($_POST['id'])){
    $id = $_POST['id'];
    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $con->query('DELETE FROM Students WHERE ID=' . $id);
    echo ('Deleted');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="id" placeholder="Enter ID" required>
    <input type="submit" value="Submit">
</form>
</body>
</html>
