<?php
include_once('../models/users.php');
include_once('../models/connexions.php');

$wrong_cred = null;
$not_allowed = null;
if (!empty ($_POST['login'])  and !empty($_POST['password'])){
        if(check_if_allowed($_SERVER['REMOTE_ADDR'])){
            $role = authentify_user($_POST['login'], $_POST['password']);
   
            if (!is_null($role)){
	        session_start();
	        session_regenerate_id();
       	        $_SESSION['user'] = $_POST['login'];
	        $_SESSION['role'] = $role;
                header('Location: ../views/messages.php');
            }
            else{
                $wrong_cred = 'Wrong credentials!';
            }
        }
        else{
            $not_allowed = "You tried to log in too many times today. Try again tomorrow!";
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

<body class="bg-dark">
  <div class="container">
    
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php if(!is_null($wrong_cred)){?>
	  
	      <div class="alert alert-danger" role="alert">
		<?php echo $wrong_cred; ?>
	      </div>
	<?php } if (!is_null($not_allowed)) {?>
	      <div class="alert alert-danger" role="alert">
		<?php echo $not_allowed; ?>
	      </div>
    <?php }?>
        <form action="../views/login.php" method="post">
          <div class="form-group">
            <label for="inputUsername">Username</label>
            <input class="form-control" id="inputUsername" name="login" type="text">
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" id="inputPassword" name="password" type="password">
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Login">
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/popper/popper.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
