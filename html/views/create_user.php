<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');
$wrong_password = null;
$wrong_login = null;

if(isset($_POST['login']) and isset($_POST['role']) and isset($_POST['validity']) and isset($_POST['password']) and isset($_POST['password2'])){
    if ($_POST['password'] != $_POST['password2']){
	$wrong_password = "The two passwords should be identical!";
    }else{
    $result = create_user($_POST['login'], $_POST['role'], $_POST['validity'], crypt($_POST['password']));
    if(!$result){
	$wrong_login = "This login already exists!";
    }
    else{
	header('Location: users.php');
    }
    }
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
	  <h1>New user</h1>
	  <hr></hr>
	  <?php if(!is_null($wrong_password)){?>
	  <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="alert alert-danger" role="alert">
		<?php echo $wrong_password; ?>
	      </div>
	    </div>
          </div>
	  <?php }?>
	  <?php if(!is_null($wrong_login)){?>
	  <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="alert alert-danger" role="alert">
		<?php echo $wrong_login; ?>
	      </div>
	    </div>
          </div>
	  <?php }?>
	  <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="card">
      		<div class="card-header">Create new user</div>
      		<div class="card-body">
        	  <form action="create_user.php" method="post">
          	    <div class="form-group">
            	      <label for="login">Login</label>
            	      <input class="form-control" id="login" name="login" type="text" required>
          	    </div>
		    <div class="form-group">
		      <label for="role">Role</label>
		      <select class="form-control" id="role" name="role" required>
			<option disabled selected value></option>
			<option value="employee">Employee</option>
			<option value="admin">Administrator</option>
		      </select>
		    </div>
	    	      <label>Active?</label>
	 		<div>
			  <input type="radio"  name="validity" id="optionsRadios1" value="1" required> 
		        <label>Yes</label>
	    	        </div>
		      <div>
			  <input type="radio" name="validity" id="optionsRadios2" value="0" required > 
		        <label>No</label>
		      </div>
		    <div class="form-group">
		      <label for="password">Password</label>
		      <input class="form-control" id="password" name="password" type="password" required>
		    </div>
		    <div class="form-group">
		      <label for="password2">Confirm password</label>
		      <input class="form-control" id="password2" name="password2" type="password" required>
		    </div>
		    <span class="float-right">
		      <input class="btn btn-success" type="submit" value="Create">
		      <a href="users.php"><button class="btn btn-primary" type="button">Cancel</button></a>
		    </span>
        	  </form>
                </div>
              </div>
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
