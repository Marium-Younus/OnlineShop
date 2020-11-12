<?php
 
if(isset($_POST["imageInsert"])){
	$statusMsg = '';
	$dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'onlineshopdb';
        
        //Create connection and select DB
        $hp_db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($hp_db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
	
		$radioVal = $_POST["imgfolder"];

		if($radioVal==3){
				//file upload path
				$targetDir = "../public/images/products/";
				$fileName = basename($_FILES["file"]["name"]);
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$dataTime = date("Y-m-d H:i:s");
				$td = "images/products/";

				if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
					//allow certain file formats
					$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
					if(in_array($fileType, $allowTypes)){
						//upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


							$insert = $hp_db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$td','3')");
							}

							if($insert){
								header('location:../public/dashpanel.php');
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
		elseif($radioVal==7){
				//file upload path
				$targetDir = "../public/images/layout";
				$fileName = basename($_FILES["file"]["name"]);
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$dataTime = date("Y-m-d H:i:s");
				$td = "images/layout/";

				if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
					//allow certain file formats
					$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
					if(in_array($fileType, $allowTypes)){
						//upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


							$insert = $hp_db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$td','7')");
							}

							if($insert){
								header('location:../public/dashpanel.php');
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
				//file upload path
				$targetDir = "../public/images/";
				$fileName = basename($_FILES["file"]["name"]);
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$dataTime = date("Y-m-d H:i:s");
				$td = "images/";

				if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
					//allow certain file formats
					$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
					if(in_array($fileType, $allowTypes)){
						//upload file to server
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


							$insert = $hp_db->query("INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$fileName','$dataTime','1','$td','3')");
							}

							if($insert){
								header('location:../public/dashpanel.php');
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

	}

	else{
		$statusMsg = 'Please select a file to upload.';
		echo $statusMsg;
	}	








/*extract($_REQUEST);

$db=mysqli_connect('localhost','root','','onlineshopdb');
if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }

//file upload path
	$targetDir = $pp;
	$fileName = basename($_FILES["$oo"]["name"]);;
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d H:i:s");
	$tmp = $_FILES["$oo"]['tmp_name'];

		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		
if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($tmp, $targetFilePath)){
				$query="INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$ff','$dataTime','1','$pp','$ii')";

				$result=$con->query($query);
				
				if($result){
					//echo "File uploaded successfully.";
				}else{
					echo "File upload failed, please try again.";
					echo $statusMsg;
				} 
			}
			else{
				$statusMsg = "Sorry, there was an error uploading your file.";
				echo $statusMsg;
			}
		}
		else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			echo $statusMsg;
		}

/*
$dataTime = date("Y-m-d H:i:s");
$targetFilePath = $pp . $ff;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');

		$query="INSERT INTO `images`(`name`, `created`, `status`, `path`, `imgCategory`) VALUES ('$ff','$dataTime','1','$pp','$ii')";

		$result=$con->query($query);

		if($result){
			echo 'Data Updated';
		}
		else{
			echo 'Update Failed';
		}
*/
?>