<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');
$dd = date("Y-m-d H:i:s");
$query="INSERT INTO `comment`(`prodId`, `userId`, `body`, `created`) VALUES ('$pp','$uu','$bb','$dd')";

$result=$con->query($query);
?>