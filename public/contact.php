<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick-theme.css">
<link rel="stylesheet" href="assets/default-assets/style.css">
<link rel="stylesheet" href="assets/default-assets/animate.css">
<link rel="stylesheet" href="assets/default-assets/font-awesome.min.css">
<link rel="stylesheet" href="assets/default-assets/magnific-popup.css">
<link rel="stylesheet" href="assets/default-assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/style.css">
	
<title>Contact</title>
<style>
	@font-face {
  		font-family: logoFont;
  		src: url(assets/fonts/Bridgesty.otf);
	}
	@font-face {
  		font-family: ;
  		src: url(assets/fonts/Montserrat-ExtraLight.ttf);
	}
	h2{
		text-transform: uppercase;
		font-family: Montserrat;
	}
	h5{
		font-family: Montserrat;
		font-weight: bold;
	}
	.aboutUsBtn{
		text-transform: uppercase;
		color: #83464C;
		font-weight: bolder;
	}
</style>
</head>
<?php

	include('header.php');
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	
	if(isset($_POST["btn"]))
	{
	$name = $_POST["fullName"];
	$email = $_POST["emailId"];
	$message = $_POST["messsage"];

	require '../includes/PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->IsMail();                                      // Set mailer to use SMTP


	$mail->Host = 'smtp.gmail.com';                 // Specify main and backup server

	$mail->Port = 587;                                    // Set the SMTP port
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'hannatues@gmail.com';                // SMTP username
	$mail->Password = 'montanna';                  // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = 'hannatues@gmail.com';
	$mail->FromName = 'Admin';
	$mail->AddAddress('hannatues@gmail.com');  // Add a recipient

	$mail->IsHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Test Successful';
	$mail->Body    = 'Test';
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->Send()) {
	   echo 'Message not sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}

	echo 'Message has been sent';

	}
?>
<body>

 <!-- ***** Contact Area Start ***** -->
  <section class="mona-contact-area section-padding-80-0">
    <div class="container">
      <div class="row align-items-center justify-content-between">

        <!-- Google Maps -->
        <div class="col-12 col-lg-6 col-xl-6">
          <div class="google-maps mb-80">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11956.9355465873!2d24.0768412544878!3d56.9550599906977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2z4Kaw4Ka_4KaX4Ka-LCDgprLgp43gpq_gpr7gpp_gp43gpq3gpr_gpoY!5e0!3m2!1sbn!2sbd!4v1543911160102"
              allowfullscreen></iframe>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="col-12 col-lg-6 col-xl-5">
          <div class="mona-contact-form mb-80">
            <div class="contact-heading">
              <h2 style="font-family: Adequate ExtraLight;font-weight: bold">Contact Us</h2>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
            </div>

            <form action="" method="post">
              <div class="form-group">
                <label for="fullName">Name:</label>
                <input type="text" class="form-control alphabetCheck" name="fullName" id="fullName" required>
              </div>
              <div class="form-group">
                <label for="emailId">Email:</label>
                <input type="email" class="form-control" name="emailId" id="emailId" required>
              </div>
              <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="messsage" rows="8" cols="80" id="messsage" required></textarea>
              </div>
              <input class="btn mona-btn btn-2 mt-15" style="border-radius: 3rem;" type="submit" name="btn" value="Contact Us"/>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Single Contact Card -->
        <div class="col-12 col-lg-4">
          <div class="single-contact-card mb-80">
            <h2 style="font-family: Adequate ExtraLight;font-weight: bold">Address</h2>
            <h6>255 Goyeau Ave, Windsor, Canada</h6>
          </div>
        </div>

        <!-- Single Contact Card -->
        <div class="col-12 col-lg-4">
          <div class="single-contact-card mb-80">
            <h2 style="font-family: Adequate ExtraLight;font-weight: bold">Call Us</h2>
            <h6>519-791-3058</h6>
          </div>
        </div>

        <!-- Single Contact Card -->
        <div class="col-12 col-lg-4">
          <div class="single-contact-card mb-80">
            <h2 style="font-family: Adequate ExtraLight;font-weight: bold">Email</h2>
            <h6>syedasanasarwat@gmail.com</h6>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Contact Area End ***** -->


<?php include('footer.php');?>
<script>
	$(document).ready(function(){
        $(".alphabetCheck").keypress(function(event){
            var inputValue = event.which;
            // allow letters and whitespaces only.
            if(!(inputValue >= 65 && inputValue <= 123) && (inputValue != 32 && inputValue != 0)) { 
                event.preventDefault(); 
            }
            //console.log(inputValue);
        });
		
		 $(".priceCheck").keydown(function (event) {


        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault(); 
        //if a decimal has been added, disable the "."-button

    });
		
		$(".numberCheck").keypress(function( event ){
			var key = event.which;

			if( ! ( key >= 48 && key <= 57 ) )
				event.preventDefault();
		});
    });
</script>
</body>
</html>