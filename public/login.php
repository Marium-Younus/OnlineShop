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
<title>Login</title>
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
	include('../includes/db.php');
	$db = new db();
	include('../includes/config.php');
	$config = new config();
	//include('../includes/hp_db.php');
	//$hp_db = new hp_db();
	
	if(isset($_POST['submit'])){
	$userName= $_POST['username'];
	$userPass= $_POST['password'];
	
	$query="Select * from users where UserName='$userName' AND PasswordHash='$userPass'";

	$result = $db->query($query)->fetchArray();

		if($result){
		$_SESSION['username'] = $userName;
		//header('location: services.php');
			$userId = $result['Id'];
			$check = "Select r.RoleId FROM userroles r JOIN users u ON r.UserId = u.Id where u.Id = '$userId'";
			
			$auth = $db->query($check)->fetchArray();
			$_SESSION['userRole'] = $auth['RoleId'];
			$_SESSION['userID'] = $userId;
			$r = $auth['RoleId'];
			
			$a = $config->checkRole($r);
		}
		else{
			echo("Wrong username or password.");
		}
	}
?>
<body>

<!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>Integer vehicula mauris libero, at molestie eros imperdiet sit amet.</p>
							<a class="button button-account" href="register.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" method="post" name="login_form" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" required="required" name="username" id="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" required="required" name="password" id="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="Login" name="submit" id="submit" formmethod="post" class="button button-login w-100">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

<?php include('footer.php');?>
</body>
</html>