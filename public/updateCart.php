<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');
if($pa==0){
	$query="DELETE FROM `cart` WHERE `id`='$ca'";
}
else{
	$query="UPDATE `cart` SET `prodAmt`='$pa',`total`='$tt' WHERE `id`='$ca'";
}
$result=$con->query($query);
?>