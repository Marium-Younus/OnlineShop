<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$dd = date("Y-m-d");
$query="UPDATE `inventory` SET `upper`='$uu',`lower`='$ll',`current`='$cc',`lastUpdated`='$dd' WHERE `id`='$ii'";
$result=$con->query($query);
?>