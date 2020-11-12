<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="INSERT INTO `cart`(`UserId`, `prodId`, `prodAmt`, `total`) VALUES ('$uu','$pp','$pa','$tt')";

$result=$con->query($query);
?>