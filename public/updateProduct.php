<?php
extract($_REQUEST);

$con=mysqli_connect('localhost','root','','onlineshopdb');

$query="UPDATE `products` SET `name`='$nn',`price`='$pp',`detail`='$dd',`tags`='$tt' WHERE `id`='$ii'";
$result=$con->query($query);


?>