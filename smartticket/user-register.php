<?php
session_start();
#echo($_POST['user_type']);
// initializing variables
$errors = array(); 

// connect to the database
include('includes/config.php');
// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
	$username = $_POST['username'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	

	// form validation: ensure that the form is correctly filled ...
  	// by adding (array_push()) corresponding error unto $errors array
  	if (empty($username)) { array_push($errors, "Username is required"); }
  	if (empty($email)) { array_push($errors, "Email is required"); }
  	if (empty($password)) { array_push($errors, "Password is required"); }
  	if ($password != $confirm_password) {
		array_push($errors, "Password and confirm password do not match");
  	}

  	// check if email availble or not
  	$sql_check = "SELECT user_email from USER where user_email=:email";
	$query = $dbh -> prepare($sql_check);
	$query -> bindParam(':email',$email, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{	
		array_push($errors, "Username already exists");

	}


  	// Finally, register user if there are no errors in the form
  	if (count($errors) == 0) {
  			$password = md5($password);//encrypt the password before saving in the database

  			$sql= "INSERT INTO USER(user_name, user_email, user_password, user_phone, user_dob, user_gender, user_city) VALUES(:username, :email, :password, :phone, :dob, :gender, :city)";

			$query = $dbh->prepare($sql);
			$query->bindParam(':username',$username,PDO::PARAM_STR);
			$query->bindParam(':email',$email,PDO::PARAM_STR);
			$query->bindParam(':password',$password,PDO::PARAM_STR);
			$query->bindParam(':phone',$phone,PDO::PARAM_STR);
			$query->bindParam(':dob',$dob,PDO::PARAM_STR);
			$query->bindParam(':gender',$gender,PDO::PARAM_STR);
			$query->bindParam(':city',$city,PDO::PARAM_STR);
			$query->execute();
			$msg="Registraion Succeful";
			echo($msg);
			$check=1;
			if($_POST['user_type']=='employee')

				$check=1;
			echo($_POST['user_type']);
			if($check==1)
			{
				$email=$_SESSION['login'];
				header('location: employee-mymetro.php');
				 
				 
			}
			else
			{
				$_SESSION['login'] = $email;
				header('location: index.php');
			}
	  		
  		}
  	else{
		  foreach($errors as $error)
		{
  			echo($error);
  		}
  			header('location: user-register.php');

  		}
		  
	  

}





?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Smart Ticket System</title>
	<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="admin/css/style.css">
</head>



<body style="background:#a5d7eb">
<!--Header-->
<?php include('includes/header1.php');?>
<!-- /Header -->

	<div class="login-page bk-img" >
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:black;">USER REGISTER</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="user-register.php">

									<label for="" class="text-uppercase text-sm">Full Name </label>
									<input type="text" placeholder="Full Name" name="username" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">email </label>
									<input type="text" placeholder="Email" name="email" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">Date of Birth </label>
									<input type="text" placeholder="YYYY-MM-DD" name="dob" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">Phone Number </label>
									<input type="text" placeholder="Phone Number" name="phone" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">City</label>
									<input type="text" placeholder="City" name="city" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">Gender </label><br>
									<label class="radio-inline" style="margin-right:30px">
									<input type="radio" name="gender" value="M" >Male
									</label>
									<label class="radio-inline">
									<input type="radio" name="gender" value="F">Female
									</label>
									<br>
									<br>
									
									
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required="required">

									<label for="" class="text-uppercase text-sm">Confirm Password</label>
									<input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control mb" required="required">
									
									<label for="" class="text-uppercase text-sm">Upload Folder with 10 Face Images</label>
									<input type="file"  name="folder_upload" webkitdirectory mozdirectory />
									<br>
									<input type="checkbox" name="check" value="C" checked >I agree to the terms and conditions.
									
									<br>
									<br>
									


									<button class="btn btn-primary btn-block" name="register" type="submit" style="background-color: #d9534f; font-size:14pt">Register</button>
									<br>
									<p align="center">Already a user? <a href="user-login.php"> Login here </a></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>


<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->
</body>

</html>
