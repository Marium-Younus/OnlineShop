<?php

	extract($_REQUEST);
	$con=mysqli_connect('localhost','root','','onlineshopdb');
	$query="UPDATE `slider` SET `exc`='$ee',`title`='$tt',`detail`='$dd',`btn`='$bb',`src`='$ss' WHERE `id`='$ii'";
	$result=$con->query($query);

?>