<?php
include_once('../models/messages.php');
include_once('../utils/check_session.php');
if(!isset($_GET['id'])){
    header('Location: messages.php');
}

$message = get_message_detail($_GET['id']);
if($message['receiver'] != $_SESSION['user']){
    header('Location: messages.php');
}
?><!--
<html>
    <head>
    </head>
    <body>
	<form action="messages.php">
	    <input type="submit" value="Return to messages">
	</form>
        <p>From: <?php echo $message['sender']; ?>
	<p>Title: <?php echo $message['title']; ?>
	<p>Time: <?php echo $message['time']; ?>
	<p>Message: <br/><br/><?php echo $message['message'];?>
	<form action="../utils/delete_message.php" method="post">
	    <input type="hidden" name="msg" value="<?php echo $message['id'];?>">
	    <input type="submit" value="Delete">
	</form>
	<form action="write_message.php" method="post">
	    <input type="hidden" name="reply_to" value="<?php echo $message['sender'];?>">
	    <input type="hidden" name="reply_title" value="<?php echo $message['title'];?>">
	    <input type="submit" value="Reply">
	</form>
    </body>
</html>-->

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>STI</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!--Navigation-->
    <?php include("../includes/nav_bar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
	<div class="row justify-content-center">
	    <div class="col-md-8">
              <form action="messages.php" >
	    	<button class="btn btn-primary float-left" type="submit"><i class="fa fa-fw fa-arrow-left"></i> Return to messages </button>
	      </form>
	    </div>
	  </div><br/>
	<div class="row justify-content-center">
	    <div class="col-md-8">
	      <div class="card">
  	        <div class="card-header text-muted">
                <?php echo $message['time'];?>
                </div>
                <div class="card-body">
    	          <h4 class="card-title"><?php echo $message['sender'];?></h4>
    	          <h6 class="card-subtitle mb-2 "><?php echo $message['title'];?></h6>
		  <p class="card-text"><?php echo $message['message'];?></p>
		  <span class="float-right">
	            <a href="write_message.php?reply_title=<?php echo $message['title'];?>&reply_to=<?php echo $message['sender'];?>" class="btn btn-primary">
		      <i class="fa fa-fw fa-reply" data-toggle="tooltip" data-original-title="Reply"></i>
		    </a>
		    <a href="../utils/delete_message.php?msg=<?php echo $message['id'];?>" class="btn btn-danger">
		      <i class="fa fa-fw fa-remove" data-toggle="tooltip" data-original-title="Delete"></i>
		    </a>
		  </span>
 	        </div>
	      </div><br/>	
	    </div>
	  </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
        </div>
      </div>
    </footer>
    
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/popper/popper.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
  </div>
</body>

</html>
