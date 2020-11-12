<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="DELETE FROM `userinfo` WHERE `UserId`='$uu'";

$result=$con->query($query);
?>