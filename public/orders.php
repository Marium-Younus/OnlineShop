<?php
extract($_REQUEST);
$dd = date("Y-m-d H:i:s");
$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="INSERT INTO `orders`(`orderId`, `UserId`, `prodId`, `prodAmt`, `total`, `orderStatus`) VALUES ('$oo','$uu','$pp','$aa','$tt','1')";

$query2="DELETE FROM `cart` WHERE id = '$cc'";
$query3="UPDATE `inventory` SET `current`=(current-'$aa'),`lastUpdated`='$dd' WHERE `prodId`='$pp'";
$result=$con->query($query);
$result2=$con->query($query2);
$result3=$con->query($query3);
?>