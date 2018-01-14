<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../models/messages.php');
include_once('../utils/check_session.php');

$wrong_user = null;

if(isset($_POST['to']) and isset($_POST['title']) and isset($_POST['message'])){
    if(write_message($_SESSION['user'], $_POST['to'], $_POST['title'], $_POST['message'])){
        header('Location: messages.php');
    }
    else{
        $wrong_user = "This user doesn't exist!";
    }
}
if(isset($_GET['reply_to']) and isset($_GET['reply_title'])){
    $to = $_GET['reply_to'];
    $title = "Re: ".$_GET['reply_title'];
    unset($_GET['reply_to']);
    unset($_GET['reply_title']);
}
else{
    $to = '';
    $title = '';
}

?>
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
	    <div class="col-md-6">
              <form action="messages.php" >
	    	<button class="btn btn-primary float-left" type="submit"><i class="fa fa-fw fa-arrow-left"></i> Return to messages </button>
	      </form>
	    </div>
	  </div><br/>
          <?php if(!is_null($wrong_user)){?>
	  <div class="row justify-content-center">
	    <div class="col-md-6">
	      <div class="alert alert-danger" role="alert">
		<?php echo $wrong_user; ?>
	      </div>
	    </div>
          </div>
	  <?php }?>
	  <div class="row justify-content-center">
	    <div class="col-md-6">
	      <div class="card">
	      <div class="card-header">New message</div>
      		<div class="card-body">
        	  <form action="write_message.php" method="post">
          	    <div class="form-group">
            	      <label for="to">To:</label>
            	      <input class="form-control" id="to" name="to" type="text" value="<?php echo $to; ?>" required>
          	    </div>
		    <div class="form-group">
		      <label for="title">Title:</label>
		      <input class="form-control" id="title" name="title" type="text" value="<?php echo $title; ?>">
		    </div>
	  	    <div class="form-group">
    	    	      <label for="body">Message:</label>
    	      	      <textarea class="form-control" id="body" name="message" rows="3"></textarea>
          	    </div>
          	    <input class="btn btn-primary float-right" type="submit" value="Send">
        	  </form>
                </div>
              </div>
	      <div>
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
