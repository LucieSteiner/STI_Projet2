<?php
include_once('../models/messages.php');
include_once('check_session.php');
if(isset($_GET['msg']) and isset($_SESSION['user'])){
    $recv = get_message_receiver($_GET['msg']);
    if($recv == $_SESSION['user']){
	delete_message($_GET['msg']);
	header('Location: ../views/messages.php');
    }

}

?>
