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
  <title>Cart</title>
</head>
<?php

	include('header.php');
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	$userId = $_SESSION['userID'];
	
	$conditions['where'] = array('UserId' => $userId,);
	$cart = $hp_db->getRows('cart', $conditions);
	if(!$cart){
		echo '<script> location.replace("emptybag.php"); </script>';
	}
	
?>
<body>
	  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                          </tr>
                      </thead>
                      <tbody>
						  <!--Products from the users cart-->
                          <?php
						  foreach($cart as $c){
							  
								$conditions2['where'] = array('id' => $c['prodId'],);
								$conditions2['return_type'] = 'single';
								$prod = $hp_db->getRows('products', $conditions2);
							  
							    $conditions3['where'] = array('ProdId' => $prod['id'],);
								$conditions3['return_type'] = 'single';
								$imgLink = $hp_db->getRows('imglink', $conditions3);
							  
							    $conditions4['where'] = array('id' => $imgLink['imgId'],);
								$conditions4['return_type'] = 'single';
								$img = $hp_db->getRows('images', $conditions4);
							  
							  
							echo ' 
							<input type="hidden" class="cartId" value="'.$c['id'].'" />
							<tr class="cartItem">
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="'.$img['path'].$img['name'].'" alt="" style="height: 100px; width: 150px;">
                                      </div>
                                      <div class="media-body">
                                          <p style="text-transform:uppercase;">'.$prod['name'].'</p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5 id="itemPrice'.$prod['id'].'">$'.$prod['price'].'</h5>
                              </td>
                              <td>
                                 <div class="product_count">
								 <input type="text" name="qty" id="sst'.$prod['id'].'" maxlength="12" value="'.$c['prodAmt'].'" title="Quantity:" class="input-text qty">
								  <button class="c change items-count'.$prod['id'].'" id="increase" onclick="increaseValue'.$prod['id'].'()" type="button" style="margin-top: -35%;"><i class="lnr lnr-chevron-up"></i></button>
								  <button class="c reduced items-count'.$prod['id'].'" id="decrease" onclick="decreaseValue'.$prod['id'].'()" type="button"><i class="lnr lnr-chevron-down"></i></button>
								   </div>
                              </td>
                              <td>
                                  <h5>$<span id="totalPrice'.$prod['id'].'" class="totalPrice">'.($prod['price']*$c['prodAmt']).'</span></h5>
                              </td>
							  
                          </tr>
						  <script>
						  function increaseValue'.$prod['id'].'() {
							  var value = parseInt(document.getElementById(\'sst'.$prod['id'].'\').value, 10);
							  value = isNaN(value) ? 0 : value;
							  value++;
							  document.getElementById(\'sst'.$prod['id'].'\').value = value;
							}

							function decreaseValue'.$prod['id'].'() {
							  var value = parseInt(document.getElementById(\'sst'.$prod['id'].'\').value, 10);
							  value = isNaN(value) ? 0 : value;
							  value < 1 ? value = 1 : \'\';
							  value--;
							  document.getElementById(\'sst'.$prod['id'].'\').value = value;
							}
							
							$(document).ready(function(){
		
								$(document).on(\'click\', \'.items-count'.$prod['id'].'\', function(){
								
									var price = '.$prod['price'].';
									var qty = $(\'#sst'.$prod['id'].'\').val();
									
									var total = price*qty;
									$(\'#totalPrice'.$prod['id'].'\').text(total);
									
									var cartid = '.$c['id'].';
									
									$.get(\'updateCart.php\',{ca:cartid,pa:qty,tt:total},function(data){
										 
									});
								});
								
								
							});
							
						  </script>
						  ';

							}
						  ?>
						  <!--Caculate total Amount and Proceed to checkout-->
                          <tr class="bottom_button">
                              <td>
                              	
                              </td>
                              
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="cupon_text d-flex align-items-center">
									  <h6>Have a Coupon?</h6>
                                      <input type="text" placeholder="Coupon Code">
                                      <a class="primary-btn" href="#">Apply</a>
                                      
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <td>
                                  <h5 id="total"></h5>
                              </td>
                          </tr>
                          <tr class="shipping_area">
                              <td class="d-none d-md-block">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <h5>Shipping</h5>
                              </td>
                              <td>
                                  <div class="shipping_box">
                                      <ul class="list">
                                          <li class="active"><a href="#">Free Shipping</a></li>
                                      </ul>
                                  </div>
                              </td>
                          </tr>
                          <tr class="out_button_area">
                              <td class="d-none-l">

                              </td>
                              <td class="">

                              </td>
                              <td>

                              </td>
                              <td>
                                  <div class="checkout_btn_inner d-flex align-items-center">
                                      <a class="gray_btn" href="products.php?page=1" style="padding:0px 10px;">Continue Shopping</a>
                                      <a class="primary-btn ml-2" href="checkout.php">Proceed to checkout</a>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
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
		var sum = 0;
		$('.totalPrice').each(function(index, obj){
			var price = $(this).text();
			var priceVal = parseFloat(price);
			sum += priceVal;
			
		});
		
		$('#total').text('$'+sum);
		
		$(document).on('click', '.c', function(){
								
			var sum = 0;
			$('.totalPrice').each(function(index, obj){
				var price = $(this).text();
				var priceVal = parseFloat(price);
				sum += priceVal;

			});
			
			$('#total').text('$'+sum);
		});
		
	});	
	
	</script>
</body>
</html>