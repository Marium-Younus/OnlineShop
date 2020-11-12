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
  <title>Product</title>
</head>
<?php

	include('header.php');
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	
	
	
	if(!isset($_GET["ID"])){
		echo '<script> location.replace("http://localhost/onlineshop/public/products.php?page=1"); </script>';
	}
	else{
		$ID = $_GET["ID"];
	}
	
	$conditions['where'] = array('id' => $ID,);
	$conditions['return_type'] = 'single';
	$p = $hp_db->getRows('products', $conditions);
	
	$conditions2['where'] = array('id' => $p['category'],);
	$conditions2['return_type'] = 'single';
	$cat = $hp_db->getRows('subcategory', $conditions2);
	
	$conditions4['where'] = array('ProdId' => $p['id'],);
	$conditions4['return_type'] = 'single';
	$imglink = $hp_db->getRows('imglink', $conditions4);
					
	$conditions3['where'] = array('id' => $imglink['imgId'],);
	$conditions3['return_type'] = 'single';
	$img = $hp_db->getRows('images', $conditions3);
	
	if(!isset($_SESSION['userID'])){
		$userId = 0;
	}
	else{
		$userId = $_SESSION['userID'];
	}
?>
<body>

<!--================Single Product Area =================-->
<input type="hidden" value="<?php echo $userId;?>" id="userId"/>
<input type="hidden" value="<?php echo $ID;?>" id="prodId"/>
	<div class="product_image_area" style="margin-top: -7%;">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $img['path'].$img['name']; ?>" alt="">
						</div>
						<!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div> -->
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3 style="text-transform:uppercase;"><?php echo $p['name']; ?></h3>
						<h2>$<span id="prodPrice"><?php echo $p['price']; ?></span></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?php echo $cat['name']; ?></a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
						<p><?php echo $p['detail'];?></p>
						<div class="product_count">
              <label for="qty">Quantity:</label>
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="fa fa-arrow-circle-up"></i></button>
							<input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
               class="reduced items-count" type="button"><i class="fa fa-arrow-circle-down"></i></button>
							            
						</div>
						<a class="button primary-btn" href="" id="addToCart">Add to Cart</a>
						<div class="card_area d-flex align-items-center">
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-thumbs-up"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-thumbs-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p><?php echo $p['detail'];?></p>
					<p><?php echo $p['detail'];?></p>
				</div>
				
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="rating_list">
										<h3>Reviews</h3>
										
									</div>
								</div>
							</div>
							<div class="review_list" style="margin-top:3%;">
								<?php
								$conditions7['where'] = array('prodId' => $p['id'],);
								$comment = $hp_db->getRows('comment', $conditions7);
								if($comment){
								foreach($comment as $c){
									
									$conditions8['where'] = array('UserId' => $c['userId'],);
									$conditions8['return_type'] = 'single';
									$u = $hp_db->getRows('userinfo', $conditions8);
									
									echo '<div class="review_item">
									<div class="media">
										
										<div class="media-body" style="margin-top:2%;">
											<h4 style="font-weight:bold;">'.$u['FirstName'].' '.$u['LastName'].'</h4>
											<p style="margin-top:-3%; color:grey;">'.$c['created'].' . <input type="button" style="font-style: italic;background:none;border:none;margin:0;padding:0;cursor: pointer;" id="replyBtn'.$c['id'].'" value="Reply"/></p>
											
										</div>
									</div>
									<p>'.$c['body'].'</p>
								</div>
								<form action="" class="form-contact form-review mt-3" style="display:none" id="replyForm'.$c['id'].'">
								  
								  <div class="form-group">
									<textarea class="form-control different-control w-100" name="replyarea" id="replyarea'.$c['id'].'" cols="30" rows="5" placeholder="Enter Message"></textarea>
								  </div>
								  <div class="form-group text-center text-md-right mt-3">
									<button type="button" style="background:none;border:none;margin:0;padding:0;cursor: pointer;" id="reply'.$c['id'].'">Submit</button>
									<button type="button" style="background:none;border:none;margin:0;margin-left:2%;padding:0;cursor: pointer;" id="cancelRply'.$c['id'].'">Cancel</button>
								  </div>
								</form>
								<script>
								$(document).on(\'click\', \'#replyBtn'.$c['id'].'\', function(){
									$(\'#replyForm'.$c['id'].'\').fadeIn(300);
								});
								
								$(document).on(\'click\', \'#reply'.$c['id'].'\', function(){
									var cmntid = '.$c['id'].';
									var prodid = $(\'#prodId\').val();
									var userid = $(\'#userId\').val();
									var body = $(\'#replyarea'.$c['id'].'\').val();
									$.get(\'submitReply.php\',{uu:userid,cc:cmntid,bb:body},function(data){
					
									});
									
									location.replace("product.php?ID="+prodid);
								});
								
								$(document).on(\'click\', \'#cancelRply'.$c['id'].'\', function(){
									$(\'#replyForm'.$c['id'].'\').fadeOut(500);
								});
								</script>
								';
									
									$conditions9['where'] = array('commentId' => $c['id'],);
									$reply = $hp_db->getRows('replies', $conditions9);
									if($reply){
									foreach($reply as $r){
										$conditions10['where'] = array('UserId' => $r['userId'],);
										$conditions10['return_type'] = 'single';
										$ru = $hp_db->getRows('userinfo', $conditions10);
										
										echo '<div class="review_item" style="margin-left: 5%; border-left: 2px solid #EEEEEE; padding-left:5%">
									<div class="media">
										
										<div class="media-body">
											<h4 style="font-weight:bold;">'.$ru['FirstName'].' '.$ru['LastName'].'</h4>
											<p style="margin-top:-3%; color:grey;">'.$r['created'].'</p>
										</div>
									</div>
									<p>'.$r['body'].'</p>
								</div>';
									}
									}
								}
								}
								?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								
                <form action="" class="form-contact form-review mt-3">
                  <div class="form-group">
                    <input class="form-control" name="subject" type="text" placeholder="Enter Subject" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message" required></textarea>
                  </div>
                  <div class="form-group text-center text-md-right mt-3">
                    <button type="button" class="button button--active button-review" id="comment">Submit Review</button>
                  </div>
                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
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
<script>
$(document).ready(function(){
	$(document).on('click', '#addToCart', function(){
		
		var userid = $('#userId').val();
		if(userid==0){
			window.location.href = "login.php";
		}else{
			var prodid = $('#prodId').val();
			var qty = $('#sst').val();
			var price = $('#prodPrice').text();
			var priceVal = parseFloat(price);
			var total = priceVal*qty;

			$.get('addToCart.php',{uu:userid,pp:prodid,pa:qty,tt:total},function(data){

			});
		}
	});
	$(document).on('click', '#comment', function(){
		var userid = $('#userId').val();
		if(userid==0){
			window.location = "login.php";
		}else{
			var prodid = $('#prodId').val();
			var body = $('#textarea').val();
			if(prodid==0||body==0){
				
			}
			else{
					$.get('submitComment.php',{uu:userid,pp:prodid,bb:body},function(data){
					
					});
					
				}
			location.replace("product.php?ID="+prodid);
		}
	});
	
	
	
});
</script>
</body>
</html>