<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];
//echo ($email);
$sql ="SELECT user_id,user_name,user_email,user_balance FROM USER WHERE  user_email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach ($results as $result) {
		# code...
		$id = $result->user_id;
		$name= $result->user_name;
		$email= $result->user_email;
		$balance = $result->user_balance;
	}


} else{
  
header('location: index.php');

}
$sql_travel ="SELECT * FROM TRAVEL WHERE  user_id=:id";
$query1= $dbh -> prepare($sql_travel);
$query1-> bindParam(':id', $id, PDO::PARAM_INT);
$query1-> execute();
$results_tarvel=$query1->fetchAll(PDO::FETCH_OBJ);



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
<?php include('includes/header.php');?>
<!-- /Header -->


<div class="row">
  <div class="col-sm-6">
    <br><br><br>
    <h2 align="center">HI</h2>
      <h3 align="center"><?php echo htmlentities($name);  ?></h3>
  </div>
  <div class="col-sm-4">
    <br><br><br>
    <h2 align="right">MY WALLET</h2>
    <h3 align="right"  >Balance: <?php echo htmlentities($balance);  ?> rs</h3>
  </div>
    <div class="col-sm-2">
    <br><br>
    <p align="center"><a href="add-money.php" ><img width="80pt" height="80pt" src="assets/images/add-money-icon.png"></a></p>
    <h4 align="center" >Add Money</h4>
  </div>
         <button class="fun choice-pay-btn" data-toggle="collapse" data-target="#books">Previous Rides</button>
                        <div class="creditCardForm" id="books">
                            
                           <table cellpadding="20" cellspacing="3" class="col-12 text-center">
                               <tr style="background-image: linear-gradient(to right, #80d0c7 , #89f7fe );">
                                    <th>My Metro</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <th>Ride Cost</th>
                                </tr>
                                <?php
                                foreach ($results_tarvel as $travel) {
                                		
											   $src_id = $travel->source_id;
											   $dst_id = $travel->destination_id;
											   $travel_date_enter = $travel->travel_date_enter;
                         $travel_date_exit = $travel->travel_date_exit;

										$sql_station ="SELECT station_name FROM STATION WHERE  station_id=:id";
										$query3= $dbh -> prepare($sql_station);
										$query3-> bindParam(':id', $src_id, PDO::PARAM_INT);
										$query3-> execute();
										$results_srcstation=$query3->fetchAll(PDO::FETCH_OBJ);
										foreach ($results_srcstation as $src) {
											
											$src_name = $src->station_name;
										}
										

										$sql_station ="SELECT station_name FROM STATION WHERE  station_id=:id";
										$query4= $dbh -> prepare($sql_station);
										$query4-> bindParam(':id', $dst_id, PDO::PARAM_INT);
										$query4-> execute();
										$results_dststation=$query4->fetchAll(PDO::FETCH_OBJ);
										foreach ($results_dststation as $dst) {
											
											$dst_name = $dst->station_name;
										}
                    $station1 = $src_id;
                    $station2 = $dst_id;     
                    $n = abs($station1-$station2);

                    $sql2 ="SELECT ride_cost FROM RIDECOST WHERE  no_of_stations=:n";
                  $query2= $dbh -> prepare($sql2);
                  $query2-> bindParam(':n',$n, PDO::PARAM_INT);
                  $query2-> execute();
                  $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                  $this_ride_cost=0;
                  foreach ($results2 as $result) {
                      $this_ride_cost = $result->ride_cost; 
                  }




                                 ?>
                                 	<tr style="background-image: linear-gradient(to right, #66a6ff , #89f7fe );">
                                    <td><img class="payment-img" src="assets/images/train-logo.png"></td>
                                    <td><?php echo htmlentities($travel->travel_date_enter);  ?></td>
                                    <td><?php echo htmlentities($travel->travel_date_exit);  ?></td>
                                    <td><?php echo htmlentities($src_name);  ?></td>
                                    <td><?php echo htmlentities($dst_name);  ?></td>
                                    <td><?php echo htmlentities($this_ride_cost);  ?></td>

                                </tr>
				                 <?php 
				                   } 
                                 ?>
                                
                                
                            
                            </table> 
                        </div>


<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<!--Footer -->
<?php include('includes/footer.php');?>
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