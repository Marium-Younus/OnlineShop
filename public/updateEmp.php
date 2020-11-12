<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="UPDATE `empinfo` SET `FirstName`='$ff',`LastName`='$ll',`PhoneNumber`='$pp',`Address`='$aa',`City`='$tt',`Country`='$cc' WHERE `UserId`='$uu'";
$result=$con->query($query);

$query2="UPDATE `users` SET `Email`='$ee' WHERE `Id`='$uu'";
$result2=$con->query($query2);
?>