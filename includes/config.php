<?php
class config{
	
	/* 
	*Check role when logging in and redirect accordingly
	*/
	public function checkRole($role){
			
			if($role == '1'){
				
				echo '<script> location.replace("dashboard.php"); </script>';
				return(1);
			}
			elseif($role == '2'){
				
				echo '<script> location.replace("dashboard.php"); </script>';
				return(2);
			}
			else{
				
				echo '<script> location.replace("index.php"); </script>';
				return(3);
			}
	}
	
	/* 
	*Manage permissions and page access control
	*/
	public function Authenticate($permission){
		if($permission=="Admin"){
			if(!isset($_SESSION['username'])){
    			header('location:login.php');
			}
			elseif($_SESSION['userRole']!=1){
				header('location: index.php');
			}
			else{
				
			}
		}
		elseif($permission=="Employee"){
			if(!isset($_SESSION['username'])){
    			header('location:login.php');
			}
			elseif($_SESSION['userRole']==3){
				header('location: index.php');
			}
			else{
				
			}
		}
		elseif($permission=="User"){
			if(!isset($_SESSION['username'])){
    			header('location:login.php');
			}
			else{
				
			}
		}
		elseif($permission==""){
			if(!isset($_SESSION['username'])){
    			header('location:login.php');
			}
			else{
				
			}
		}
		else{
			echo("Authentication Error");
		}
		
	}
	
}

/* 
*Upload Parallax image to the home page
*/
if(isset($_POST["upload_parallax"])){
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
	//file upload path
	$targetDir = "images/layout/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
	$dataTime = date("Y-m-d H:i:s");
	if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
		//allow certain file formats
		$allowTypes = array('jpg','png','jpeg','PNG','JPEG','JPG');
		if(in_array($fileType, $allowTypes)){
			//upload file to server
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				$title = $_POST["title"];
				$detail = $_POST["detail"];
				$src = $_POST["srcLink"];
				$btnText = $_POST["btnText"];
				$insert = $hp_db->query("UPDATE `parallax` SET `name`='$fileName',`title`='$title',`details`='$detail',`src`='$src',`btn`='$btnText' WHERE `id`= '1'");
				if($insert){
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

function password_encrypt($password){
	$hash_format = "$2y$10$";
	$salt = "Salt22CharactersOfMore";
	$format_and_salt=$hash_format.$salt;
	$hash=crypt($password,$format_and_salt);
	return $hash;
}

?>