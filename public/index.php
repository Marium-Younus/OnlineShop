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
<link rel="stylesheet" href="assets/shop/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="assets/shop/themify-icons/themify-icons.css">
<link rel="stylesheet" href="assets/shop/owl-carousel/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/shop/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/shop/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/shop/nice-select/nice-select.css">
<link rel="stylesheet" href="assets/shop/nouislider/nouislider.min.css">
<link rel="stylesheet" href="assets/shop/linericon/style.css">
<link rel="stylesheet" href="assets/shop/style.css">
<title>Home</title>
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
  <!-- ***** Welcome Area Start ***** -->
  <section class="welcome-area" style="height: 600px; left: 2%;">
    <!-- Welcome Slides -->
    <div class="welcome-slides owl-carousel">
	<?php
    	$slider = $hp_db->getRows('slider');
		foreach($slider as $s){
			
			$conditions['where'] = array('id' => $s['image'],);
			$conditions['return_type'] = 'single';
    		$img = $hp_db->getRows('images', $conditions);
			
			echo '
			<div class="single-welcome-slide"  style="height: 600px; left: 2%;">
			<!-- Main Background Image -->
			<div class="main-bg-img bg-img" data-animation="fadeInUpBig" data-delay="200ms" style="background-image: url('.$img['path'].$img['name'].');"></div>
			<!-- Welcome Text -->
			<div class="container h-100">
			  <div class="row h-100 align-items-center">
				<div class="col-12">
				  <div class="welcome-text">
					<h2 data-animation="bounceInUp" data-delay="400ms">'.$s['title'].'</h2>
					<h5 data-animation="bounceInUp" data-delay="600ms">'.$s['detail'].'</h5>
					<a href="'.$s['src'].'" class="btn" data-animation="bounceInUp" data-delay="800ms">'.$s['btn'].'</a>
				  </div>
				</div>
			  </div>
			</div>
			<!-- Social Info -->
			<div class="social-info">
			  <a href="#" data-animation="bounceInDown" data-delay="1000ms"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
			  <a href="#" data-animation="bounceInDown" data-delay="1100ms"><i class="fa fa-twitter"></i> <span>Twitter</span></a>
			  <a href="#" data-animation="bounceInDown" data-delay="1200ms"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
			  <a href="#" data-animation="bounceInDown" data-delay="1300ms"><i class="fa fa-youtube-play"></i> <span>Youtube</span></a>
			</div>
			
		  </div> ';
		}
	?>
      

    </div>
  </section>
	
 <!-- ================ About Us Area Start ================= -->
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
	<!-- ================ About Us Area End ================= -->
	
	<!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Our Most Popular Items</p>
          <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
         <?php /*Get the most sold products*/
			$con=mysqli_connect('localhost','root','','onlineshopdb');
			$t1="SELECT i.path as 'path',i.name as 'image',p.id as 'ID',p.name as 'Product',SUM(prodAmt) as 'Sold', c.name as 'Category', p.price as 'price',p.detail as 'detail',p.tags as 'tags' FROM orders o JOIN products p on p.id=o.prodId JOIN imglink l ON l.ProdId = p.id JOIN images i ON i.id=l.imgId JOIN subcategory c on c.id=p.category GROUP BY o.prodId ORDER BY Sold DESC LIMIT 10";
			$tr1=$con->query($t1);
			
			foreach($tr1 as $t){
				echo 
					'<div class="card text-center card-product" style="height:487.69px">
						<div class="card-product__img">
						  <img class="img-fluid" src="'.$t['path'].$t['image'].'" alt="">
						  <ul class="card-product__imgOverlay">
							<li><button onclick="location.href = \'product.php?ID='.$t['ID'].'\';" ><i class="ti-shopping-cart"></i></button></li>
						  </ul>
						</div>
						<div class="card-body">
						  <p>'.$t['Category'].'</p>
						  <h4 class="card-product__title"><a href="product.php?ID='.$t['ID'].'">'.$t['Product'].'</a></h4>
						  <p class="card-product__price">$'.$t['price'].'</p>
						</div>
					  </div>';
			}
		?>
        </div>
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= --> 
<?php include('footer.php');?>
<script src="assets/shop/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/shop/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/shop/skrollr.min.js"></script>
<script src="assets/shop/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/shop/nice-select/jquery.nice-select.min.js"></script>
<script src="assets/shop/nouislider/nouislider.min.js"></script>
<script src="assets/shop/jquery.ajaxchimp.min.js"></script>
<script src="assets/shop/mail-script.js"></script>
<script src="assets/shop/js/main.js"></script>
<script src="assets/default-assets/mona.bundle.js"></script>
<script src="assets/default-assets/active.js"></script>
<script src="assets/default-assets/owl.carousel.min.js"></script>

</body>
</html>