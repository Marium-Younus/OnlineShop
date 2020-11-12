<?php

/* 
*New Product with Image
*/
if(isset($_POST["NewSliderImage"])){
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
	$targetDir = "images/layout/";
	$fileName = basename($_FILES["sliderfile"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d");
	if(isset($_POST["updtSlider"])) {
		if(!empty($_FILES["sliderfile"]["name"])){
		//allow certain file formats
		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($_FILES["sliderfile"]["tmp_name"], $targetFilePath)){
				$sid = $_POST["sliderId"];
				$exc = $_POST["exc"];
				$title = $_POST["title"];
				$button = $_POST["sbutton"];
				$detail = $_POST["details"];
				$source = $_POST["source"];
				
				$insert = $db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$targetDir','7')");
				
				if($insert){
					$imgId = 0;
					$getImgId = $db->query("SELECT `id` FROM `images` WHERE `name`='$fileName'");
					foreach($getImgId as $img){
						$imgId = $img['id'];
					}
					
					$updtSlider = $db->query("UPDATE `slider` SET `image`='$imgId',`exc`='$exc',`title`='$title',`detail`='$detail',`btn`='$button',`src`='$source' WHERE `id`='$sid'");
					
					
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
			$sid = $_POST["sliderId"];
			$exc = $_POST["exc"];
			$title = $_POST["title"];
			$button = $_POST["sbutton"];
			$detail = $_POST["details"];
			$source = $_POST["source"];
		
		$udptSlider = $db->query("UPDATE `slider` SET `exc`='$exc',`title`='$title',`detail`='$detail',`btn`='$button',`src`='$source' WHERE `id`='$sid'");
					
					
		header('location:dashboard.php');
		}
	}
	else{
				$sid = $_POST["sliderId"];
				$exc = $_POST["exc"];
				$title = $_POST["title"];
				$button = $_POST["sbutton"];
				$detail = $_POST["details"];
				$source = $_POST["source"];
		
		$udptSlider = $db->query("UPDATE `slider` SET `exc`='$exc',`title`='$title',`detail`='$detail',`btn`='$button',`src`='$source' WHERE `id`='$sid'");
					
					
		header('location:dashboard.php');
	}	
}
?>