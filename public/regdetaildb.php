<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$query="INSERT INTO `userinfo`(`UserId`, `FirstName`, `LastName`, `Gender`, `PhoneNumber`, `Address`, `City`, `Country`, `PostalCode`) VALUES ('$ii','$ff','$ll','$ss','$pp','$aa','$cc','$nn','$zz')";
$result=$con->query($query);
$query2="INSERT INTO `userroles`(`UserId`, `RoleId`) VALUES ('$ii','3')";
$result2=$con->query($query2);
echo '<script> location.replace("login.php"); </script>';
?>