<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$query="INSERT INTO `subcategory`(`name`, `category`) VALUES ('$cc','$mm')";
$result=$con->query($query);
?>