
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Header</title>
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
<link rel="icon" href="images/layout/JY-logo.png" type="image/png">
<style>
	.navbar{
		position: relative;
		background-image: url("images/layout/front-nav01.png") ;
		background-size: 100% 100%;
		background-repeat: no-repeat;
		height: 150px;
		filter: drop-shadow(-9px 6px 6px rgba(0,0,0,0.3));
		z-index: 10;
		opacity: 0.85;
	}	
	.navbar a{
		color: white;
		font-weight: bolder;
	}
	.navbar1{
		background-image: url("images/empty.png");
		position: absolute;
		top: 5%;
		right: 0;
		display: flex;
		justify-content: flex-end;
		background-color: #262626; /*B76E79,484848*/
		border: 2px solid #262626;
		z-index: 9;
		height: 80px;
		width: 100%;
		padding-top:3%;
		/*filter: drop-shadow(-9px 3px 3px rgba(0,0,0,0.3));*/
	}
	.navbar1 a{
		display: inline-block;
		color: black;
		font-family: Montserrat;
		z-index: 20px;
	}
	.overlap{
		position: absolute;
		background-color: aqua;
		z-index: 1;
	}
	.underlap{
		position: absolute;
		background-color: transparent;
		z-index: 3;
		color: black;
		font-family: Montserrat;
		justify-content: flex-end;
		text-align: right;
		left: 75%;
	}	


@media screen and (max-width: 982px) {
	#DesktopNav{
		display: none;
		height: 0px;
		width: 0px;
	}
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}
	#MobileNav{
		display: none;
	}
	#MobileNav a.icon {
		float: right;
		display: block;
		color: white;
  	}
	#MobileNav .icon:hover {
	  background-color: #ddd;
	  color: black;
	}
	.mobNavTop{
		position: relative;
		background-image: url("images/layout/front-nav01.png") ;
		background-size: 100% 100%;
		background-repeat: repeat;
		height: 80px;
		filter: drop-shadow(-9px 6px 6px rgba(0,0,0,0.3));
		z-index: 2;
		opacity: 0.85;
	}
	.navbar2{
		background-image: url("images/empty.png");
		position: absolute;
		top: 1%;
		right: 0;
		display: flex;
		justify-content: flex-end;
		background-color: #262626; /*B76E79,484848*/
		border: 2px solid #262626;
		z-index: 1;
		height: 50px;
		width: 100%;
		padding-top:3%;
	}
	.mobNavMenu{
		display: flex;
		justify-content: flex-start;
		background-color: #262626;
		height: auto;
		margin-top: -24px;
		align-content: flex-start;
		color: white;
	}
	.mobNavMenu a{
		color: white;
	}
	.mobNavMenu ul{
		margin-top: 45px;
		margin-left: 20px;
		padding-bottom: 30px;
	}
@media screen and (max-width: 982px) {
	#MobileNav{
		display: block;
	}
  .topnav.responsive .icon {
    position: absolute;
    right: 2%;
    top: 25%;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
	#searchBar{
		border: none;
		border-bottom: 2px solid #757575;
		background-color: transparent;
		color: white;
		border-radius: 0rem;
		height: 33px;
	}
	#searchBar:focus {
		border: none;
		border-bottom: 2px solid #757575;
		background-color: transparent;
		color: white;
		border-radius: 0rem;
		height: 33px;
		outline-width: 0;
		outline: none;
	}
	.dropdown-menu.fade {
   display: block;
   opacity: 0;
   pointer-events: none;
}

.show > .dropdown-menu.fade {
   pointer-events: auto;
   opacity: 1;
}
</style>
</head>
<body>
<!--Desktop-->
<div class="topnav" id="DesktopNav">
		<nav class="navbar navbar-expand-sm">
	  <!-- Brand/logo -->
	  <a class="navbar-brand" href="index.php" style="font-family: Adequate ExtraLight; font-size: 60px; font-weight: normal;">JY</a>

	  <!-- Links -->
	  <ul class="navbar-nav" style="font-family: Adequate ExtraLight;">
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="shopMenu">SHOP</a>
		  		  <ul class="dropdown-menu" style="background-color: black; padding: 20px;border-radius: 0rem;line-height:2" id="shopMenuDrop">
					  <li><a href="products.php?page=1">Makeup</a></li>
					  <li><a href="products.php?page=2">Jewelry</a></li>
				  </ul>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="aboutus.php">ABOUT US</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="contact.php">CONTACT US</a>
		</li>
	  </ul>
	  <ul class="navbar-nav underlap">
	  	<li class="nav-item">
		  <input class="form-control searchBar searchResults" id="searchBar" type="text" placeholder="Search.." aria-label="Search" name="searchResults">
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="#" class="apply"><i class="fa fa-search"></i></a>
		</li>
		
	  		<?php
				if(isset($_SESSION['username'])){
					echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="dropdown" id="userMenu"><i class="fa fa-user-o"></i></a>
					  <ul class="dropdown-menu" style="background-color: black; padding: 20px;border-radius: 0rem;line-height:2;left:30%" id="userMenuDrop">
						<li><a href="">Order History</a></li>
						<li><a href="logout.php">Logout</a></li>
					  </ul></li>';
				}
				else{
					echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-user-o"></i></a></li>';
				}
			?>
		  
		
		<li class="nav-item">
		  <a class="nav-link" href="cart.php"><i class="fa fa-shopping-bag"></i><span class="nav-shop__circle"></span></a>
		</li>
	  </ul>
	</nav>
	<nav class="navbar1 navbar-expand-sm">

	</nav>
	</div>
	
	
	<!--Mobile-->
	<div class="topnav responsive" id="MobileNav">
	<div class="mobNavTop">
		<a class="navbar-brand" href="#" style="font-family: Adequate ExtraLight; font-size: 40px; font-weight: normal; color: white; margin-left: 2%;">JY</a>
		<a href="javascript:void(0);" class="icon" id="hamburger">
				<i class="fa fa-bars"></i>
	  	</a>
	</div>
		<nav class="navbar2 navbar-expand-sm">
			
		</nav>
		<div class="mobNavMenu" id="MobNavMenu" style="display: none;">
			
			<ul class="navbar-nav" style="font-family: Adequate ExtraLight;width: 100%;">
				<!--<li class="nav-item">-->
					<div style="height: 30px;width: 100%;margin-bottom: 2%;margin-left:-2%;" class="container-fluid">
						 <span style="display: inline-flex;"><input class="form-control searchBar searchResults" id="searchBar" type="text" placeholder="Search.." aria-label="Search" name="searchResults"><a class="nav-link" href="#" class="apply"><i class="fa fa-search"></i></a>
						 <a class="nav-link" href="cart.php" style="margin-left: 5%;margin-right: 5%"><i class="fa fa-shopping-bag"></i><span class="nav-shop__circle"></span></a>
						  <?php
							if(isset($_SESSION['username'])){
								echo '<a class="nav-link" href="#" data-toggle="dropdown" id="userMenu"><i class="fa fa-user-o"></i></a>
								  <ul class="dropdown-menu" style="background-color: black; padding: 20px;border-radius: 0rem;line-height:2;left:30%" id="userMenuDrop">
									<li><a href="">Order History</a></li>
									<li><a href="logout.php">Logout</a></li>
								  </ul>';
							}
							else{
								echo '<a class="nav-link" href="login.php"><i class="fa fa-user-o"></i></a>';
							}
						?></span>
					</div>
				<!--</li>-->
				<li class="nav-item">
				  <a class="nav-link" href="products.php">SHOP</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="aboutus.php">ABOUT US</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="contact.php">CONTACT US</a>
				</li>
	  		</ul>
		</div>
	</div>
	




<script src="assets/default-assets/mona.bundle.js"></script>
<script src="assets/default-assets/active.js"></script>
<script src="assets/default-assets/owl.carousel.min.js"></script>
<script>
	$(document).ready(function() {
			$('#hamburger').on('click',function(e){
				$('#MobNavMenu').fadeToggle(300);
			});
		
			$('#userMenu').on('click',function(e){
				$('#userMenuDrop').fadeToggle(300);
			});
		
			$('#shopMenu').on('click',function(e){
				$('#shopMenuDrop').fadeToggle(300);
			});
		
		
		  $(".nav .dropdown").focusin( function (){
			 $(this).find(".dropdown-menu").each(function(){
			   $(this).css({"display":'block','opacity':'1','top':'60px'}); 
			 });
  			});
  
			$(".nav .dropdown").focusout( function (){
				 $(this).find(".dropdown-menu").each(function(){
				   $(this).css({"display":'block','opacity':'0','top':'0px'}); 
				 });
			  });
		
			
		
	});
	
	$(document).on('click', '.apply', function(){
		e.preventDefault();
		var term = $('.searchResults').text();
		window.location.replace("products.php?search=" + encodeUriComponent(term));
	});
</script>
</body>
</html>