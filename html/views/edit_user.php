<?php
include_once('../models/users.php');
include_once('../utils/check_session.php');
include_once('../utils/check_admin.php');

$user = get_user_detail($_GET['user_id']);
$wrong_password = null;

if(isset($_POST['role']) and isset($_POST['validity'])){
    if(isset($_POST['password']) and !empty($_POST['password'])){
        if(isset($_POST['password2']) and ($_POST['password'] == $_POST['password2'])){
           $password = crypt($_POST['password']);
           edit_user($_GET['user_id'], $user['login'], $_POST['role'], $_POST['validity'], $password);
           header('Location: users.php');
        }
        else{
           $wrong_password = "The two passwords should be identical!";
        }
    }
    else{
        $password = $user['password'];
        edit_user($_GET['user_id'], $user['login'], $_POST['role'], $_POST['validity'], $password);
        header('Location: users.php');
    }
   
}
?><
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
	  <h1><?php echo $user['login'];?></h1>
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
	    <div class="row justify-content-center">
	    <div class="col-md-4">
	      <div class="card">
		<div class="card-header">Edit user</div>
      		<div class="card-body">
        	  <form action="edit_user.php?user_id=<?php echo $_GET['user_id'];?>" method="post">
		    <div class="form-group">
		      <label for="role">Role</label>
		      <select class="form-control" id="role" name="role">
			<option <?php if ($user['role'] =="employee") {echo "selected ";} ?> value="employee">Employee</option>
			<option <?php if ($user['role'] =="admin") {echo "selected ";} ?> value="admin">Administrator</option>
		      </select>
		    </div>
		    <fieldset class="form-group">
	    	      <label>Active?</label>
	    	      <div class="form-check">
	      		<label class="form-check-label">
			  <input <?php if ($user['validity'] == "1") {echo "checked ";} ?> type="radio" class="form-check-input" name="validity"  value="1"> Yes
		        </label>
	    	      </div>
		      <div class="form-check">
		        <label class="form-check-label">
			  <input <?php if ($user['validity'] == "0") {echo "checked ";} ?> type="radio" class="form-check-input" name="validity" value="0"> No
		        </label>
		      </div>
	  	    </fieldset>
		    <div class="form-group">
		      <label for="password">New password</label>
		      <input class="form-control" id="password" name="password" type="password" >
		    </div>
 		    <div class="form-group">
		      <label for="password2">Confirm password</label>
		      <input class="form-control" id="password2" name="password2" type="password" >
		    </div>
		    <span class="float-right">
		      <input class="btn btn-success" type="submit" value="Edit">
		      <a href="users.php"><button class="btn btn-primary" type="button">Cancel</button></a>
		    </span>
        	  </form>
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
