<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="DELETE FROM `users` WHERE `Id`='$uu'";
$result=$con->query($query);

$query2="DELETE FROM `empinfo` WHERE `UserId`='$uu'";
$result2=$con->query($query2);
?>