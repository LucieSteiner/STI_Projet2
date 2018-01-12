
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../index.php">STI</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li data-original-title="Messages" class="nav-item" data-toggle="tooltip" data-placement="right" title="">
          <a class="nav-link" href="../views/messages.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Messages</span>
          </a>
        </li>
	<li data-original-title="My profile" class="nav-item" data-toggle="tooltip" data-placement="right" title="">
          <a class="nav-link" href="../views/profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>
	<?php if($_SESSION['role'] == 'admin'){ ?>
	<li data-original-title="Manage users" class="nav-item" data-toggle="tooltip" data-placement="right" title="">
          <a class="nav-link" href="../views/users.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Manage users</span>
          </a>
        </li>
    	<?php } ?>
        
        
        
        
        
        
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="../utils/logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>

      </ul>
    </div>
</nav>
  
