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
	
<title>About Us</title>
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
	
?>
<body>
<!-- ***** About Us Area Start ***** -->
 <?php
    	$conditions['where'] = array('id' => '1',);
		$conditions['return_type'] = 'single';
    	$a1 = $hp_db->getRows('about', $conditions);
	
		$conditions3['where'] = array('id' => $a1['image'],);
		$conditions3['return_type'] = 'single';
    	$img1 = $hp_db->getRows('images', $conditions3);
	
		$conditions2['where'] = array('id' => '2',);
		$conditions2['return_type'] = 'single';
    	$a2 = $hp_db->getRows('about', $conditions2);
	
		$conditions4['where'] = array('id' => $a2['image'],);
		$conditions4['return_type'] = 'single';
    	$img2 = $hp_db->getRows('images', $conditions4);
		
 ?>
  <section class="mona-about-us-area mb-30 section-padding-80-0">
    <div class="container">
      <div class="row">
		  
		  <div class="col-12 col-sm-12 col-lg-12" style="text-align: center; display: inline;">
			  <div class="about-us-content mb-50 wow fadeInUp" data-wow-delay="50ms">
				  <span><h2 style="font-family: Adequate ExtraLight;font-weight: bold">JY BEAUTY<span style="color:#83464C">.</span></h2><h5>Accentuate your shine</h5></span>
			  </div>
		  </div>
        <!-- About Us Thumbnail -->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="about-us-thumbnail mb-50 wow fadeInUp" data-wow-delay="100ms">
            
            <img src="<?php echo $img1['path'].$img1['name'];?>" alt="" style="clip-path: polygon(40% 0, 100% 0, 100% 100%, 0 100%, 0 40%);">
           
          </div>
        </div>

        <!-- About Us Thumbnail -->
        <div class="col-12 col-sm-6 col-lg-4">
			
			
			<div style="position: relative; z-index: 10;">
			  <div class="about-us-thumbnail mb-50 wow fadeInUp" data-wow-delay="400ms">
		
				<img src="<?php echo $img2['path'].$img2['name'];?>" alt="" style="clip-path: polygon(100% 0, 100% 60%, 60% 100%, 0 100%, 0 0);">

			  </div>
			</div>
        </div>

        <!-- About Us Content -->
        <div class="col-12 col-lg-4">
          <div class="about-us-content mb-50 wow fadeInUp" data-wow-delay="700ms">
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet ipsumlor eut consetetur sadipscing elitr.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Single Service Area -->
    <div class="container">
      <div class="service-area mt-80">
        <div class="row">

          <!-- Single Service Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="100ms">
              <i class="fa fa-facebook-square"></i>
              <h5>Facebook</h5>
              <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="300ms">
              <i class="fa fa-twitter-square"></i>
              <h5>Twitter</h5>
              <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="500ms">
              <i class="fa fa-instagram"></i>
              <h5>Instagram</h5>
              <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="700ms">
              <i class="fa fa-youtube-square"></i>
              <h5>Youtube</h5>
              <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php include('footer.php');?>
</body>
</html>