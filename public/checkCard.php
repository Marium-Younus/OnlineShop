<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','bank');

$query="SELECT * FROM `card` WHERE `number` = '$cc' AND `cvv` = '$cv' AND `expiry` = '$ee' AND `balance` >= '$tt'";

$result=$con->query($query);
$rows=mysqli_num_rows($result);
if($rows>0){
	$query2="UPDATE `card` SET `balance`=(balance-'$tt') WHERE `number` = '$cc'";

	$result2=$con->query($query2);
	
	echo 1;
}
else{
	
	echo 2;
}
?>