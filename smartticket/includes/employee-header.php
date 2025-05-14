
<header>


  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">

      <div class="navbar-header">
        
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT emp_name FROM EMPLOYEE WHERE emp_email=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->emp_name); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="employee-account-details.php">Profile Settings</a></li>
              <li><a href="employee-update-password.php">Update Password</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
                   <?php   if(strlen($_SESSION['login'])==0)
          {
        ?>
         <div class="user_login"> <a href="../smartticket/user-login.php" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login</a> </div>
         <div class="user_login"> <a href="../smartticket/user-register.php" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Register</a> </div>
        <?php }
        else{
            echo "&nbsp;&nbsp;Welcome Smart Ticket Technology";
        } ?>

      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="employee-index.php"><img " width="80pt" height="25pt" src="assets/images/train-logo.png"/></a></li>
          <li><a href="employee-index.php">Home</a>    </li>

          <li><a href="employee-mymetro.php">My Metro</a>
          <li><a href="employee-contact-us.php">Contact Us</a></li>
          <li><a href="employee-aboutus.php">About Us</a></li>
          
          <li>

          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
