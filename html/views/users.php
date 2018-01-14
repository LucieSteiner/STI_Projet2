<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
include_once('../models/users.php');
$users = get_all_users();
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
	<h1>Manage users</h1>
	  <hr></hr>
	  <div class="row justify-content-center">
	    <div class="col-md-4">
              <form action="create_user.php" >
	    	<button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-plus"></i> Create new user </button>
	      </form>
	    </div>
	  </div><br/>
	    <?php foreach($users as $user){ ?>
	    <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="card">
                <div class="card-body">
    	          <h5 class="card-title"><?php echo $user['login']; ?>
		  <?php if (get_user_id($_SESSION['user']) != $user['id']){?>
		  <span class="float-right">
	            <a href="edit_user.php?user_id=<?php echo $user['id'];?>" class="btn btn-primary">
		      <i class="fa fa-fw fa-edit" data-toggle="tooltip" data-original-title="Edit"></i>
		    </a>
		    <a href="../utils/delete_user.php?to_delete=<?php echo $user['id'];?>" class="btn btn-danger">
		      <i class="fa fa-fw fa-remove" data-toggle="tooltip" data-original-title="Delete"></i>
		    </a>
		  </span>
		  <?php } ?></h5>
 	        </div>
	      </div><br/>	
	    </div>
	  </div>
	      
	    <?php } ?>
	</ul>
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
