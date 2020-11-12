<?php

/* 
*New Product with Image
*/
if(isset($_POST["NewProductImage"])){
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
	$targetDir = "images/products/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d");
	if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
		//allow certain file formats
		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				
				$name = $_POST["prodName"];
				$cat = $_POST["category"];
				$price = $_POST["prodPrice"];
				$detail = $_POST["prodDetails"];
				$tags = $_POST["prodTags"];
				
				$insert = $db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$targetDir','3')");
				
				$insertProd = $db->query("INSERT INTO `products`(`name`, `category`, `price`, `detail`, `tags`) VALUES ('$name','$cat','$price','$detail','$tags')");
				if($insert){
					$imgId = 0; $prodId = 0;
					$getImgId = $db->query("SELECT `id` FROM `images` WHERE `name`='$fileName'");
					foreach($getImgId as $img){
						$imgId = $img['id'];
					}
					$getProdId = $db->query("SELECT `id` FROM `products` WHERE `name`='$name'");
					foreach($getProdId as $p){
						$prodId = $p['id'];
					}
					$insertImgLink = $db->query("INSERT INTO `imglink`(`imgId`, `ProdId`) VALUES ('$imgId','$prodId')");
					
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
?>