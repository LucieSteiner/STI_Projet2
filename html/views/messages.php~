<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('../utils/check_session.php');
include_once('../models/messages.php');
$messages = get_messages($_SESSION['user']);
?>
<!DOCTYPE html>
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
    <?php include("../includes/nav_bar.php"); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
	  <h1>Messages</h1>
	  <hr></hr>
	  <div class="row justify-content-center">
	    <div class="col-md-8">
              <form action="../views/write_message.php" >
	    	<button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-plus"></i> New message </button>
	      </form>
	    </div>
	  </div>
	  </br>
	  <?php if(count($messages) == 0){ ?>
	  <div class="row justify-content-center">
	    <div class="col-md-8">
		<div class= "alert alert-info" role="alert">You don't have any messages yet.</div>
	  </div>
	  <?php } else{foreach($messages as $message){ ?>
	  <div class="row justify-content-center">
	    <div class="col-md-8">
	      <div class="card">
  	        <div class="card-header text-muted">
                <?php echo $message['time'];?>
                </div>
                <div class="card-body">
    	          <h4 class="card-title"><?php echo $message['sender'];?></h4>
    	          <p class="card-subtitle"><?php echo $message['title'];?></p>
		  <span class="float-right">
	            <a href="write_message.php?reply_title=<?php echo $message['title'];?>&reply_to=<?php echo $message['sender'];?>" class="btn btn-primary">
		      <i class="fa fa-fw fa-reply" data-toggle="tooltip" data-original-title="Reply"></i>
		    </a>
     	            <a href="message_detail.php?id=<?php echo $message['id'];?>" class="btn btn-info">
		      <i class="fa fa-fw fa-expand" data-toggle="tooltip" data-original-title="Detail"></i>
		    </a>
		    <a href="../utils/delete_message.php?msg=<?php echo $message['id'];?>" class="btn btn-danger">
		      <i class="fa fa-fw fa-remove" data-toggle="tooltip" data-original-title="Delete"></i>
		    </a>
		  </span>
 	        </div>
	      </div><br/>	
	    </div>
	  </div>
	<?php }} ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
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

