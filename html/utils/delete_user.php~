<?php
include_once('../models/users.php');
include_once('check_session.php');
include_once('check_admin.php');

if(isset($_GET['to_delete'])){
    $admin_id = get_user_id($_SESSION['user']);
    echo $admin_id;
    if($admin_id != $_GET['to_delete']){
        delete_user($_GET['to_delete']);
	header('Location: ../views/users.php');
    }
}


?>
