<?php
$data=file_get_contents("/home/darpan/Desktop/PROJECT/CODES/Face_Recognition/face_data.json");
$res=json_decode($data);
$recognized_id=$res->user_id;
$name=$res->user_name;
$balance=$res->user_balance;
$tdate=$res->travel_date_enter;
$sstation=$res->source_station_name;

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Smart Ticket</title>
<!--Bootstrap -->
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="greeet-style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="../assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="../assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="../assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="../assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">


<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/images/favicon-icon/24x24.png">
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
<body style="background-color:  #ff6666;">

<div class="row">
    <div class="col-sm-12" align="center">
            <h6 align="right" style="color: white; font-size:12pt"> <?php date_default_timezone_set("Asia/Kolkata"); echo  date($tdate);?> </h6>

            <p  style="font-size:68px; margin-left:300px;  display: inline;"><?php echo($name)?> </p>
            <img  style="margin-right: 200pt; margin-top: -15pt; display: inline; " width="80pt" height="80pt"  src="../assets/images/verified1.gif" /> 
            
    </div>
    
</div>

<hr>


<div class="row" align="center">
  <div class="col-sm" align="center">
    <div class="col-sm-4" align="right">
        <img  width="120pt" height="120pt" src="../assets/images/wallet.png" />
       
    </div>
    <div class="col-sm" align="left">
        <p  style="color: #27ae60; font-size: 58pt; margin-top:1pt; font-weight: bold;" >&#8377;<?php echo($balance) ?></p>
    </div>
    
  </div>
  
</div>
<br>
<br>
<br>
<br>
<br>    
<div class="col-sm" align="center" style="color:White; font-size:30pt">       
     Insufficient Balance.
     <br>
     Minimum Balance required is &#8377;50.
     <br>
     Recharge your Wallet & Try-again.    
</div>
 


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