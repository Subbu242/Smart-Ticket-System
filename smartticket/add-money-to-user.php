<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_POST['em'];
//echo ($email);
$sql ="SELECT user_balance FROM USER WHERE  user_email=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	foreach ($results as $result) {
		# code...
		$balance = $result->user_balance;
	}
	$new_balance=$balance+$_POST["amount"];
	$con="update USER set user_balance=:newbal where user_email=:email";
	$chngpwd1 = $dbh->prepare($con);
	$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
	$chngpwd1-> bindParam(':newbal', $new_balance, PDO::PARAM_STR);
	$chngpwd1->execute();
	header('Location: ' . $_SERVER['HTTP_REFERER']);



} else{
  
header('Location: ' . $_SERVER['HTTP_REFERER']);


}
?>