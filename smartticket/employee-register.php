<?php
session_start();
// initializing variables
$errors = array(); 
// connect to the database
include('includes/config.php');
// REGISTER USER
if (isset($_POST['create_account'])) 
{
  // receive all input values from the form
	$username = $_POST['username'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$jobpost = $_POST['jobpost'];
	$station = $_POST['station'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];


	// form validation: ensure that the form is correctly filled ...
  	// by adding (array_push()) corresponding error unto $errors array
  	if (empty($username)) { array_push($errors, "Username is required"); }
  	if (empty($email)) { array_push($errors, "Email is required"); }
  	if (empty($password)) { array_push($errors, "Password is required"); }
	if ($password != $confirm_password) 
	{
		array_push($errors, "Password and confirm password do not match");
  	}

  	// check if email availble or not
  	$sql_check = "SELECT emp_email from EMPLOYEE where emp_email=:email";
	$query = $dbh -> prepare($sql_check);
	$query -> bindParam(':email',$email, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{	
		array_push($errors, "Employee mail already exists");

	}


  	// Finally, register user if there are no errors in the form
	if (count($errors) == 0)
	 {
  		$password = md5($password);//encrypt the password before saving in the database

  		$sql= "INSERT INTO EMPLOYEE(emp_name, emp_email, emp_password, emp_dob, emp_phone, emp_jobpost, emp_station, emp_gender, emp_address) VALUES(:username, :email, :password, :dob, :phone, :jobpost, :station, :gender, :address)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->bindParam(':dob',$dob,PDO::PARAM_STR);
		$query->bindParam(':phone',$phone,PDO::PARAM_STR);
		$query->bindParam(':jobpost',$jobpost,PDO::PARAM_STR);
		$query->bindParam(':station',$station,PDO::PARAM_STR);
		$query->bindParam(':gender',$gender,PDO::PARAM_STR);
		$query->bindParam(':address',$address,PDO::PARAM_STR);
		$query->execute();
		$msg="Registraion Succeful";
		echo($msg);
		//$_SESSION['usertype'] = $usertype;
		//$_SESSION['login'] = $email;

		header('location: admin-mymetro.php');
  	}
	else
	{
		echo($errors);
	  	foreach($errors as $error)
	  	{
  			echo($error);
  		}
		header('location: admin-mymetro.php');
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

	<div class="login-page bk-img" >
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x" style="color:black;">EMPLOYEE REGISTER</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="employee-register.php">

									<label for="" class="text-uppercase text-sm">Full Name </label>
									<input type="text" placeholder="Full Name" name="username" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">email </label>
									<input type="text" placeholder="email" name="email" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">Date of Birth </label>
									<input type="text" placeholder="DD/MM/YYYY" name="dob" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">Phone Number </label>
									<input type="text" placeholder="Phone Number" name="phone" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">Address </label>
									<textarea placeholder="Full Address" name="address" class="form-control mb"></textarea>
									
									<label for="" class="text-uppercase text-sm">Gender </label><br>
									<label class="radio-inline" style="margin-right:30px">
									<input type="radio" name="gender" value="M" >Male
									</label>
									<label class="radio-inline">
									<input type="radio" name="gender" value="F">Female
									</label>
									<br>
									<br>
									
									<label for="" class="text-uppercase text-sm">Job Post </label>
									<input type="text" placeholder="Job Post" name="jobpost" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">Assigned Station </label>
									<input type="text" placeholder="station" name="station" class="form-control mb">		
									
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Confirm Password</label>
									<input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control mb">
									
									<input type="checkbox" name="check" value="C" checked >I agree to the terms and conditions.
									<br>
									<br>
									


									<button class="btn btn-primary btn-block" name="create_account" type="submit" style="background-color: #d9534f; font-size:14pt">Create Employee Account</button>

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

</body>

</html>
