<?php

?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>About Us</h6>
          <ul>


          <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
        </div>
<?php if(!($email=$_SESSION['login'])) { ?>       
        <div class="col-md-3 col-sm-6">
          <h6>Previlaged Login</h6>
          <ul>
            <li><a href="admin-login.php">Admin Login</a></li>
          <li><a href="employee-login.php">Employee Login</a></li>
               
          </ul>
        </div>
<?php } ?>
      </div>
    </div>
  </div>

</footer>
