<?php

/* 
*New Product with Image
*/
if(isset($_POST["NewAboutImage"])){
	//$statusMsg = '';
	$dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'onlineshopdb';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
	//file upload path
	if(isset($_POST["updtAbout1"])){
	$targetDir = "images/layout/";
	$fileName = basename($_FILES["about1file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d");
	if(!empty($_FILES["about1file"]["name"])) {
		//allow certain file formats
		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($_FILES["about1file"]["tmp_name"], $targetFilePath)){
				
				
				$insert = $db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$targetDir','7')");
				
				if($insert){
					$imgId = 0; $prodId = 0;
					$getImgId = $db->query("SELECT `id` FROM `images` WHERE `name`='$fileName'");
					foreach($getImgId as $img){
						$imgId = $img['id'];
					}
					
					$updtAbout = $db->query("UPDATE `about` SET `image`='$imgId' WHERE `id`='1'");
					
					header('location:dashboard.php');
					//echo "File uploaded successfully.";
				}else{
					echo "File upload failed, please try again.";
					echo $statusMsg;
				} 
			}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
				echo $statusMsg;
			}
		}
		else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			echo $statusMsg;
		}
	}
	else{
		$statusMsg = 'Please select a file to upload.';
		echo $statusMsg;
	}
		}
	elseif(isset($_POST["updtAbout2"])){
	$targetDir = "images/layout/";
	$fileName = basename($_FILES["about2file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d");
	if(!empty($_FILES["about2file"]["name"])) {
		//allow certain file formats
		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($_FILES["about2file"]["tmp_name"], $targetFilePath)){
				
				
				$insert = $db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$targetDir','7')");
				
				if($insert){
					$imgId = 0; $prodId = 0;
					$getImgId = $db->query("SELECT `id` FROM `images` WHERE `name`='$fileName'");
					foreach($getImgId as $img){
						$imgId = $img['id'];
					}
					
					$updtAbout = $db->query("UPDATE `about` SET `image`='$imgId' WHERE `id`='2'");
					
					header('location:dashboard.php');
					//echo "File uploaded successfully.";
				}else{
					echo "File upload failed, please try again.";
					echo $statusMsg;
				} 
			}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
				echo $statusMsg;
			}
		}
		else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			echo $statusMsg;
		}
	}
	else{
		$statusMsg = 'Please select a file to upload.';
		echo $statusMsg;
	}
		}
}
?>