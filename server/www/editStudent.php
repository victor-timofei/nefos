<?php
session_start();
if (! isset( $_SESSION['user_id'] ) ){
    header("Location: http://127.0.0.1:8889");
}
else {
    readfile('static/editStudent.html');

    if(isset($_POST['id'])){

        $edit = 'UPDATE Students SET NAME="' . $_POST['firstname'] . '", SURNAME="' .  $_POST['lastname'] . '", FATHERNAME="' . $_POST['fathername'] . '", GRADE=' . $_POST['grade'] . ',MOBILENUMBER="' . $_POST['mobile']  . '", BIRTHDAY="' . $_POST['birthday'] . '" WHERE ID=' . $_POST['id'];
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
        }
        else{
            $toast = '<div class="alert alert-success">Updated!</div>';
        }


    }


}
?>
