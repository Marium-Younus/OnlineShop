<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="DELETE FROM `products` WHERE `id`='$ii'";
$result=$con->query($query);	


?>