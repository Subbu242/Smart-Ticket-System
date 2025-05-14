<?php
session_start();

// initializing variables
$errors = array(); 
$usertype = "employee";
// connect to the database
include('includes/config.php');
// REGISTER USER
if (isset($_POST['update_station'])) {
  // receive all input values from the form
	$sname=$_POST['sname'];
	$sphone = $_POST['sphone'];
	$saddress = $_POST['saddress'];
	$ssn=$_POST['ssn'];
	


	// form validation: ensure that the form is correctly filled ...
  	// by adding (array_push()) corresponding error unto $errors array
  	

  	// check if email availble or not
  	

  	// Finally, register user if there are no errors in the form
  	if (count($errors) == 0) {
  			
  			$sql= "INSERT INTO STATION(station_name, station_phone,station_address,supervisor) VALUES(:name,:phone,:address,:ss)";

			$query = $dbh->prepare($sql);
			$query->bindParam(':name',$sname,PDO::PARAM_STR);
			$query->bindParam(':phone',$sphone,PDO::PARAM_STR);
			
			$query->bindParam(':address',$saddress,PDO::PARAM_STR);
			$query->bindParam(':ss',$ssn,PDO::PARAM_INT);
			
			$query->execute();
			$msg="Updation Succeful";
			echo($msg);
			//$_SESSION['usertype'] = $usertype;
			//$_SESSION['login'] = $email;

	  		header('location: admin-mymetro.php');
  	}
  	else{
  		foreach($errors as $error){
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
						<h1 class="text-center text-bold mt-4x" style="color:black;">UPDATE STATION DETAILS</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Station Name </label>
									<input type="text" placeholder="Station Name" name="sname" class="form-control mb">
									
									
									
									<label for="" class="text-uppercase text-sm">Phone Number </label>
									<input type="text" placeholder="Station Phone Number" name="sphone" class="form-control mb">
									
									<label for="" class="text-uppercase text-sm">Address </label>
									<textarea placeholder="Station Full Address" name="saddress" class="form-control mb"></textarea>
									
									
									<label for="" class="text-uppercase text-sm">Supervisor ID </label>
									<input type="text" placeholder="Supervisor ID " name="ssn" class="form-control mb">
									
									<br>
									<br>
									
									
									
									<input type="checkbox" name="check" value="C" checked >Are You Sure You Want to update the station?
									<br>
									<br>
									


									<button class="btn btn-primary btn-block" name="update_station" type="submit" style="background-color: #d9534f; font-size:14pt">Update Station</button>

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
