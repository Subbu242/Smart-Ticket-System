<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];
##echo ($email);
$sql ="SELECT admin_id,admin_name,admin_email FROM ADMIN WHERE  admin_email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach ($results as $result) {
		# code...
		$id = $result->admin_id;
		$name= $result->admin_name;
		$email= $result->admin_email;
	}


} else{
  
header('location: index.php');

}
$sql_station ="SELECT * FROM STATION";
$query2= $dbh -> prepare($sql_station);
$query2-> execute();
$results_station=$query2->fetchAll(PDO::FETCH_OBJ);



?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Smart Ticket Technology</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">


<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/24x24.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>


<!--Header-->
<?php include('includes/admin-header.php');?>
<!-- /Header -->


<div class="row">
  <div class="col-sm-6">
    <br><br><br>
      <h1 align="center"><?php echo htmlentities($name);  ?></h1>
      <h4 align="center">Administrator : <?php echo htmlentities($id);  ?></h4>
  </div>
  <div class="col-sm-4">
    <br><br><br>
    <h2 align="center">UPDATE STATION DETAILS</h2>
    
  </div>
    <div class="col-sm-2">
    <br><br>
    <p align="center"><a href="update-station.php" ><img width="80pt" height="80pt" src="assets/images/train-icon.png"></a></p>
    <h4 align="center" >Update station</h4>
  </div>
</div>
<hr style="border-top: 1px solid #c4c1c1">
<div class="row">
  <div class="col-sm-6" align="center" style="font-weight: bold; font-size: 14pt">

                    <h2>FETCH RIDE COST</h2>
                    <form method="post" action="fetch-ride-cost.php">

                    <select style="display: inline; margin-right: 15pt" name="s1">
                            <option value="01">Yalachenahalli</option>
                            <option value="02">JP Nagar</option>
                            <option value="03">Banashankari</option>
                            <option value="04">R V Road</option>
                            <option value="05">Jayanagar</option>
                            <option value="06">South End</option>
                            <option value="07">LalBagh</option>
                            <option value="08">National College</option>
                            <option value="09">K R Market</option>
                            <option value="10">Chikkapete</option>
                            <option value="11">KMS</option>
                            <option value="12">Mantri Square</option>
                            <option value="13">Sriram pura</option>
                            <option value="14">Kuvempu Road</option>
                            <option value="15">Rajaji Nagar</option>
                            <option value="16">Mahalakshmi layout</option>
                            <option value="17">Sandal Soap Factory</option>
                            <option value="18">Yashavanth pura</option>
                            <option value="19">Peenya Industry</option>
                            <option value="20">Peenya</option>
                            <option value="21">GG palya</option>
                            <option value="22">jalahalli</option>
                            <option value="23">Dasarahalli</option>
                            <option value="24">Nagasandra</option>
                </select>
                <p style="display: inline;">  TO  </p>    
                <select style="display: inline; margin-left: 15pt" name="s2">
                            <option value="01">Yalachenahalli</option>
                            <option value="02">JP Nagar</option>
                            <option value="03">Banashankari</option>
                            <option value="04">R V Road</option>
                            <option value="05">Jayanagar</option>
                            <option value="06">South End</option>
                            <option value="07">LalBagh</option>
                            <option value="08">National College</option>
                            <option value="09">K R Market</option>
                            <option value="10">Chikkapete</option>
                            <option value="11">KMS</option>
                            <option value="12">Mantri Square</option>
                            <option value="13">Sriram pura</option>
                            <option value="14">Kuvempu Road</option>
                            <option value="15">Rajaji Nagar</option>
                            <option value="16">Mahalakshmi layout</option>
                            <option value="17">Sandal Soap Factory</option>
                            <option value="18">Yashavanth pura</option>
                            <option value="19">Peenya Industry</option>
                            <option value="20">Peenya</option>
                            <option value="21">GG palya</option>
                            <option value="22">jalahalli</option>
                            <option value="23">Dasarahalli</option>
                            <option value="24">Nagasandra</option>
                </select>
                <input style="margin-left: 10pt;" type="submit"value="submit">
            </form>
                <br><br>
                <h3 style="display: inline;"><?php echo $_SESSION['cost']; ?> </h3>
                <img style="display: inline;" width="25pt" height="35pt" src="assets/images/fare-icon12.png">
                             
  </div>
  <div class="col-sm-4">
    <br>
    <h2 align="center">CREATE EMPLOYEE ACCOUNT</h2>
   
  </div>
    <div class="col-sm-2">
    <p align="center"><a href="employee-register.php" ><img width="80pt" height="80pt" src="assets/images/add-user.jpg"></a></p>
    <h4 align="center" >Add Employee</h4>
  </div>
</div>
<br>
<button class="fun choice-pay-btn" data-toggle="collapse" data-target="#books">ALL STATION INFO</button>
                        <div class="creditCardForm" id="books">
                            
                           <table cellpadding="20" cellspacing="3" class="col-12 text-center">
                               <tr>
                                    <th>My Metro</th>
                                    <th>Station Id</th>
                                    <th>Station Name</th>
                                    <th>Station Phone</th>
                                    <th>Station Adress</th>
                                    <th>Super Visor</th>
                                </tr>
                                <?php
                                foreach ($results_station as $station) {
                                		$sql_ename ="SELECT emp_name FROM EMPLOYEE WHERE  emp_id=:id";
                                		$query3= $dbh -> prepare($sql_ename);
                                		$query3-> bindParam(':id', $station->supervisor, PDO::PARAM_INT);
                                		$query3-> execute();
                                		$results_ename=$query3->fetchAll(PDO::FETCH_OBJ);
                                	?>
									
                                
                                <tr>
                                    <td><img class="payment-img" src="assets/images/train-logo.png"></td>
                                    <td><?php echo htmlentities($station->station_id);  ?></td>
                                    <td><?php echo htmlentities($station->station_name);  ?></td>
                                    <td><?php echo htmlentities($station->station_phone);  ?></td>
                                    <td><?php echo htmlentities($station->station_address);  ?></td>
                                    <td><?php foreach($results_ename as $re){ echo htmlentities($re->emp_name);  } ?></td>

                                </tr>
                                <?php } ?>
                                
                            </table> 
                        </div>



<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<!--Footer -->
<?php include('includes/admin-footer.php');?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->



<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>