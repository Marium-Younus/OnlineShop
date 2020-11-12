<?php



$name = "Valued Customer";
$email = "jybeautytest@gmail.com";
$message = $oo;
	
require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();                                      // Set mailer to use SMTP
			
			
			$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server
			
			$mail->Port = 25;                                    // Set the SMTP port
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jybeautytest@gmail.com';                // SMTP username
			$mail->Password = 'jybeauty42!';                  // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
			
			$mail->From = 'jybeautytest@gmail.com';
			$mail->FromName = $name;
			$mail->AddAddress('jybeautytest@gmail.com');  // Add a recipient
			
			$mail->IsHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Information';
			$mail->Body    = "<strong>Name: </strong>".$name."<br><strong>Email: </strong>".$email."<br><strong>Comments:</strong> ".$message."";
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			if(!$mail->Send()) {
			   echo 'Message could not be sent.';
			   echo 'Mailer Error: ' . $mail->ErrorInfo;
			   exit;
			}

?>