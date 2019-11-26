<?php



if(isset($_POST['search'])){
    $search= $_POST['search'];
    $query = 'SELECT * FROM Students WHERE NAME LIKE "%' . $search . '%"' . ' OR SURNAME LIKE "%' . $search . '%"'. ' OR FATHERNAME LIKE "%' . $search . '%"' . ' OR GRADE LIKE "%' . $search . '%"' . ' OR MOBILENUMBER LIKE "%' . $search . '%"'. ' OR BIRTHDAY LIKE "%' . $search . '%"';
    echo $query;
    $search_result = filterTable($query);
    if ($search_result) {
//        header("Location:UserCP.php");
        echo 'OK';
    } else {
//        echo 'not ok';
        echo ("Could not insert data : " . mysqli_error($search_result) . " " . mysqli_errno());
    }
}

function filterTable ($search){
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
    <meta charset="UTF-8">
    <title>Search Student</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="search" placeholder="Search" required>
    <input type="submit" value="Submit">
</form>

<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>SURNAME</th>
        <th>FATHERNAME</th>
        <th>GRADE</th>
        <th>MOBILENUMBER</th>
        <th>BIRTHDAY</th>
    </tr><?php
    while($row = mysqli_fetch_array($search_result)):
    ?>
    <tr>
        <td><?php echo $row['ID'];?></td>
        <td><?php echo $row['NAME'];?></td>
        <td><?php echo $row['SURNAME'];?></td>
        <td><?php echo $row['FATHERNAME'];?></td>
        <td><?php echo $row['GRADE'];?></td>
        <td><?php echo $row['MOBILENUMBER'];?></td>
        <td><?php echo $row['BIRTHDAY'];?></td>
    </tr>
</table>
<?php endwhile;?>
</body>
</html>