<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');
$ddd = date("Y-m-d H:i:s");
$query="INSERT INTO `bills`(`orderId`, `userId`, `date`, `total`, `payment`, `address`, `notes`) VALUES ('$ooo','$uuu','$ddd','$ttl','$ppp','$aaa','$mmm')";

$result=$con->query($query);
?>