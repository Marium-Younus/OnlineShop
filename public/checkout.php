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
  <title>Checkout</title>
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
	
	$conditions2['where'] = array('UserId' => $userId,);
	$conditions2['return_type'] = 'single';
	$user = $hp_db->getRows('userinfo', $conditions2);
	
	$conditions3['where'] = array('Id' => $userId,);
	$conditions3['return_type'] = 'single';
	$e = $hp_db->getRows('users', $conditions3);
	
	if(!$cart){
		echo '<script> location.replace("emptybag.php"); </script>';
	}
	
?>
<body>


  <!--================Checkout Area =================-->
  <section class="checkout_area section-margin--small">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Shipping Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate>
                        
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $user['Address'];?>"/>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $user['City'];?>"/>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $user['Country'];?>"/>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" value="<?php echo $user['PostalCode'];?>"/>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" value="<?php echo $user['PhoneNumber'];?>"/>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" value="<?php echo $e['Email'];?>"/>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <div class="creat_account">
                                <h3>Other</h3>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <table style="width: 100%;">
                        <tr style="font-weight: bolder; font-size: 18px;">
                        	<th>Product</th>
                        	<th></th>
                        	<th style="text-align: right;">Total</th>
                        </tr>
                        <?php
							foreach($cart as $c){
							  
								$conditions2['where'] = array('id' => $c['prodId'],);
								$conditions2['return_type'] = 'single';
								$prod = $hp_db->getRows('products', $conditions2);
								
								echo '<tr style="margin-top:5px;" class="item">
										<td style="max-width:60px;" class="name">'.$prod['name'].'</td>
										<td style="display:none;" class="prodId">'.$prod['id'].'</td>
										<td style="display:none;" class="cartId">'.$c['id'].'</td>
										<td>x <span class="amt">'.$c['prodAmt'].'</span></td>
										<td style="text-align: right;">$<span class="totalPrice">'.$c['total'].'</span></td>
									</tr>';
							}
							?>
                        </table>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$<span class="total"></span></span></a></li>
                            <li><a href="#">Discount <span>$0.00</span></a></li>
                            <li><a href="#">Total <span>$<span class="total"></span></span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="paymentMethod" value="2">
                                <label for="f-option5">Cash On Delivery </label>
                                <div class="check"></div>
                            </div>
                        </div>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="paymentMethod" value="1" checked>
                                <label for="f-option6">Credit/Debit Card </label>
                                <img src="images/layout/card.jpg" alt="">
								<div class="check"></div>
                            </div>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="terms">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <div class="text-center" id="proceed" style="display: none;">
                          <button class="button button-paypal" id="prdBtn">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <input type="hidden" id="pm" value="1"/>
  <input type="hidden" id="ui" value="<?php echo $userId; ?>"/>
  <!--================End Checkout Area =================-->
  <!--================Bank Details Modal=================-->
  <!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="cardDetails">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Card Details</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        	<form>
        		<div class="row">
        			<div class="col-sm-6">Card Number</div>
        			<div class="col-sm-6"><input type="text" id="numb" name="numb"/></div>
        		</div>
        		<div class="row">
        			<div class="col-sm-6">Expiration Date</div>
        			<div class="col-sm-6"><input type="text" id="exp" name="exp"/></div>
        		</div>
        		<div class="row">
        			<div class="col-sm-6">CVV</div>
        			<div class="col-sm-6"><input type="text" id="cvv" name="cvv"/></div>
        		</div>
        	</form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmPayment">Confirm</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
  
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
		
		$('.total').text(sum);
	
		$("#proceed").attr("disabled","disabled");
	
		$("input[name=paymentMethod]:radio").change(function () {
			var payment = $('input[name=paymentMethod]:checked').val();
			document.getElementById("pm").value = payment;
			
		});
		
		$("#f-option4").change(function () {
			if(this.checked){
                $('#proceed').fadeIn(300);
            }else{
                $('#proceed').fadeOut(300);
            }
		});
	
	
	
		
		$(document).on('click', '#prdBtn', function(){
			var userid = $("#ui").val();
			var orderid = Math.random().toString(36).slice(2);
			var total = sum;
			var payment = $("#pm").val();
			var street = $("#address").val();
			var city = $("#city").val();
			var country = $("#country").val();
			var address = street+', '+city+', '+country;
			var message = $("#message").val();
			
			
			if(payment=='2'){
				$("tr.item").each(function() {
				
					var prod = $(this).find(".prodId").html();
					var amt = $(this).find(".amt").html();
					var price = $(this).find(".totalPrice").html();
					var cartId = $(this).find(".cartId").html();

					$.get('orders.php',{oo:orderid,uu:userid,pp:prod,aa:amt,tt:price,cc:cartId},function(data){

					});
				});
				$.get('bills.php',{ooo:orderid,uuu:userid,ttl:total,ppp:payment,aaa:address,mmm:message},function(data){

				});
			}
			else{
				$('#cardDetails').modal('show');
				$(document).on('click', '#confirmPayment', function(){
					var card = $("#numb").val();
					var exp = $("#exp").val();
					var cvv = $("#cvv").val();
					var ttl = parseFloat(total);
					$.get('checkCard.php',{cc:card,ee:exp,cv:cvv,tt:ttl},function(data){
						if(data==1){
							$("tr.item").each(function() {
				
								var prod = $(this).find(".prodId").html();
								var amt = $(this).find(".amt").html();
								var price = $(this).find(".totalPrice").html();
								var cartId = $(this).find(".cartId").html();

								$.get('orders.php',{oo:orderid,uu:userid,pp:prod,aa:amt,tt:price,cc:cartId},function(data){

								});
							});
							$.get('bills.php',{ooo:orderid,uuu:userid,ttl:total,ppp:payment,aaa:address,mmm:message},function(data){

							
							});
							alert("Payment successful.");
							location.replace("index.php");
						}
					});
				});
			}
		});
	
});
</script>
</body>
</html>