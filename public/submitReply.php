<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');
$dd = date("Y-m-d H:i:s");
$query="INSERT INTO `replies`(`userId`, `commentId`, `body`, `created`) VALUES ('$uu','$cc','$bb','$dd')";

$result=$con->query($query);
?>