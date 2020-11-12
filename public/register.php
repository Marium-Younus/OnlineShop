<?php session_start();
if(isset($_SESSION['username'])){
    header('location:index.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Register</title>
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
<link rel="stylesheet" href="assets/shop/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="assets/shop/themify-icons/themify-icons.css">
<link rel="stylesheet" href="assets/shop/owl-carousel/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/shop/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/shop/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/shop/nice-select/nice-select.css">
<link rel="stylesheet" href="assets/shop/nouislider/nouislider.min.css">
<link rel="stylesheet" href="assets/shop/linericon/style.css">
<link rel="stylesheet" href="assets/shop/style.css">

</head>
<?php
	include('header.php');
	//include('../includes/db.php');
	//$db = new db();
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
?>
<body>

<!--================Register Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>Login and browse the latest collection of cosmetics and jewelry.</p>
							<a class="button button-account" style="background-color: #83464C;" href="login.php">LOGIN NOW</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						<form class="row login_form" action="#/" id="register_form" >
							<input type="text" id="emptywarning" name="emptywarning" style="border: none;color: red;background-color: transparent; width: 100%;display: none" value="Please fill all required fields" disabled>
								<input type="text" id="warning" name="warning" style="border: none;color: red;background-color: transparent; width: 100%;display: none" value="Sorry, an account with this name or email already exists" disabled>
							
							<div class="col-md-12 form-group">
								<input type="text" class="form-control alphabetCheck" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
              </div>
              <div class="col-md-12 form-group">
								
			</div>
							<div class="col-md-12 form-group">
								<button type="button" id="submit" value="submit" class="button button-register w-100" style="border-radius: 3rem;background-color: #83464C;">Continue</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Register Box Area =================-->

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
		
		$(document).on('click', '#submit', function(){
			//$('#warning').fadeIn(500);
			var name = $('#name').val();
			var email = $('#email').val();
			var pwd = $('#pwd').val();
			
			if((name=="")||(email=="")||(pass="")){
				$('#emptywarning').fadeIn(500);
			}else{
				$('#emptywarning').fadeOut(500);
				
				$.get('regdb.php',{nn:name,ee:email,pp:pwd},function(data){
			 		if(data=='error'){
						$('#warning').fadeIn(500);
					}
					else{
						$('#warning').fadeOut(500);
						location.replace("registerdetails.php?NEW="+data);
					}
				});
			}
			
			
		});
    });
</script>
<body>
</body>
</html>