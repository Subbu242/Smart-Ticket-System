
<?php
session_start();
// connect to the database
include('includes/config.php');
$email=$_SESSION['login'];

$a=$_POST['s1'];
$b=$_POST['s2'];
echo $a;
echo $b;
$n=abs($a-$b);
echo $n;
$sql ="SELECT * FROM RIDECOST WHERE  no_of_stations=:n";
$query= $dbh -> prepare($sql);
$query-> bindParam(':n', $n, PDO::PARAM_INT);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cost=0;
if($query->rowCount() > 0)
{
	foreach ($results as $result) {
		# code...
		$_SESSION['cost'] = $result->ride_cost;
		$_POST['cost']= $result->ride_cost;
		
	}
}


header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

			