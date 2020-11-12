<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="UPDATE `userinfo` SET `FirstName`='$ff',`LastName`='$ll',`PhoneNumber`='$pp',`Address`='$aa',`City`='$tt',`Country`='$cc' WHERE `UserId`='$uu'";

$query2="UPDATE `users` SET `Email`='$ee' WHERE `Id`='$uu'";

$result=$con->query($query);
$result=$con->query($query2);
?>