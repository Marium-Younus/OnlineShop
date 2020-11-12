<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$query="SELECT * FROM `users` WHERE `UserName`='$nn' OR `Email`='$ee'";
$result=$con->query($query);
$count = 0;
foreach($result as $r){
	$count++;
}



if($count==0){
	$insert="INSERT INTO `users`(`UserName`, `PasswordHash`, `Email`) VALUES ('$nn','$pp','$ee')";
	$i=$con->query($insert);

	$getID="SELECT `Id` FROM `users` WHERE `Email`='$ee'";
	$g=$con->query($getID);
	$id=0;

	foreach($g as $get){
		$id =  $get['Id'];
	}
	echo $id;
}
else{
	echo 'error';
}


?>