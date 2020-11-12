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
<title>Register Deatils</title>
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
	
	if(!isset($_GET["NEW"])){
		echo '<script> location.replace("register.php"); </script>';
	}
	else{
		$id = $_GET["NEW"];
	}
?>
<body>

<!--================Register Box Area =================-->
<input type="hidden" value="<?php echo $id;?>" id="newId"/>
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						
						<form class="row login_form" action="#/" id="register_form" >
							<input type="text" id="emptywarning" name="emptywarning" style="border: none;color: red;background-color: transparent; width: 100%;display: none" value="Please fill all required fields" disabled>
							
							<div class="col-md-12 form-group">
								<input type="text" class="form-control alphabetCheck" id="firstname" name="firstname" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required maxlength="20">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control alphabetCheck" id="lastname" name="lastname" placeholder="Last Name (optional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name (optional)'" maxlength="20">
              </div>
              <div class="col-md-12 form-group">
								
            					<select id="gender" style="border-radius: 0rem;border-top: 0px;border-right: 0px;border-left: 0px;" class="form-control">
									<option value="1" selected>Female</option>
									<option value="2">Male</option>
								</select>
             
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control numberCheck" id="phone" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required maxlength="10">
            
             
              </div>
              <div class="col-md-12 form-group">
								
			</div>
							
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						
						<form class="row login_form" action="#/" id="register_form" >
							
							
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control alphabetCheck" id="city" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" required maxlength="20">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control alphabetCheck" id="country" name="country" placeholder="Country" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Country'" required maxlength="20">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="postal" name="postal" placeholder="Postal/Zip Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal/Zip Code'" required maxlength="6" style="text-transform: uppercase;">
              </div>
							<div class="col-md-12 form-group">
								<button type="button" id="register" name="register" value="register" class="button button-register w-100" style="border-radius: 3rem;background-color: #83464C;">Register</button>
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
		
		
    });
	
	$(document).on('click', '#register', function(){
			
			var id = $('#newId').val();
			var fn = $('#firstname').val();
			var ln = $('#lastname').val();
			var sx = $('#gender option:selected').val();
			var ph = $('#phone').val();
			var ad = $('#address').val();
			var ct = $('#city').val();
			var cn = $('#country').val();
			var zc = $('#postal').val();
			//$('#emptywarning').fadeIn(500);
			
			if(fn==""||ph==""||ad==""||ct==""||cn==""||zc==""){
				$('#emptywarning').fadeIn(500);
			}else{
				$('#emptywarning').fadeOut(500);
				$.get('regdetaildb.php',{ii:id,ff:fn,ll:ln,ss:sx,pp:ph,aa:ad,cc:ct,nn:cn,zz:zc},function(data){
					data;
				});
				location.replace("login.php");
			}
			
				
			
		});
</script>
</body>
</html>