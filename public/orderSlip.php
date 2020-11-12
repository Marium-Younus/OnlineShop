<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$query="UPDATE `orders` SET `orderStatus`='$ss' WHERE `id`='$oo'";
$result=$con->query($query);
?>