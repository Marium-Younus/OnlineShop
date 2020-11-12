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
</head>
<?php

	include('header.php');
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	
    $page = '1';
	$prod = $hp_db->getRows('products');
	
?>
<body>
	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5 filters" id="filters">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="all" name="subcategory" value="all" checked><label for="men">All</label></li>
                   <?php
					  
					  if($page==1){
						  $conditions['where'] = array('category' => '1',);
						  $cat = $hp_db->getRows('subcategory', $conditions);
						  foreach($cat as $c){
							  echo '<li class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['id'].'" name="subcategory" value="'.$c['id'].'"><label for="men">'.$c['name'].'</label></li>';
						  }
					  }
					  elseif($page==2){
						  $conditions['where'] = array('category' => '2',);
						  $cat = $hp_db->getRows('subcategory', $conditions);
						  foreach($cat as $c){
							  echo '<li class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['id'].'" name="subcategory" value="'.$c['id'].'"><label for="men">'.$c['name'].'</label></li>';
						  }
					  }
					  else{
						  $cat = $hp_db->getRows('subcategory');
						  foreach($cat as $c){
							  echo '<li class="filter-list"><input class="pixel-radio" type="radio" id="'.$c['id'].'" name="subcategory" value="'.$c['id'].'"><label for="men">'.$c['name'].'</label></li>';
						  }
					  }
					  ?>
                  </ul>
                  <input id="apply" type="button" value="Apply Filters">
                </form>
              </li>
            </ul>
            
          </div>
          <div class="sidebar-filter">
           
            <div class="common-filter">
              <div class="head">Price</div>
              <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                  <div class="price">Price:</div>
                  <span>$</span>
                  <div id="lower-value"></div>
                  <div class="to">to</div>
                  <span>$</span>
                  <div id="upper-value"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center" id="filterBar">
            <div class="sorting">
              <select id="sortBy">
                <option value="" disabled selected>Sort By</option>
                <option value="ASC">Price Low to High</option>
                <option value="DESC">Price High to Low</option>
              </select>
            </div>
            <div class="sorting mr-auto">
              <select>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
              </select>
            </div>
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Products -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row" id="prodData">
             <?php
				
					foreach($prod as $p){
					
					$conditions['where'] = array('id' => $p['category'],);
					$conditions['return_type'] = 'single';
					$cat = $hp_db->getRows('subcategory', $conditions);
						
					
					
					$conditions2['where'] = array('ProdId' => $p['id'],);
					$conditions2['return_type'] = 'single';
					$imglink = $hp_db->getRows('imglink', $conditions2);
					
					$conditions3['where'] = array('id' => $imglink['imgId'],);
					$conditions3['return_type'] = 'single';
					$img = $hp_db->getRows('images', $conditions3);
					
					
					echo '
					
					<div class="col-md-6 col-lg-4 products" style="';
						if($page==1){
							if($cat['category']=='2'){
								echo 'display:none;';
							}
							else{
								echo '';
							}
						}
						elseif($page=='2'){
							if($cat['category']=='1'){
								echo 'display:none;';
							}
							else{
								echo '';
							}
						}
						else{
							echo '';
						}
							echo '">

					<div class="card text-center card-product">
					  <div class="card-product__img">
						<img class="card-img" src="'.$img['path'].$img['name'].'" alt="">
						<input type="hidden" value="'.$p['tags'].'" />
						<ul class="card-product__imgOverlay">
						  <li><button><i class="ti-search"></i></button></li>
						  <li><button><i class="ti-shopping-cart"></i></button></li>
						  <li><button><i class="ti-heart"></i></button></li>
						</ul>
					  </div>
					  <div class="card-body">
						<p style="text-transform:uppercase;">'.$cat['name'].'</p>
						<h4 class="card-product__title"  style="text-transform: capitalize"><a href="#">'.$p['name'].'</a></h4>
						<p class="card-product__price">$'.$p['price'].'</p>
					  </div>
					</div>
					
				  </div>
				  
					';
				}
					
				?>
              
            </div>
          </section>
          <!-- End Products -->
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" value="" name="sortValue" id="sortValue"/>
  <input type="hidden" value="" name="categoryValue" id="categoryValue"/>
  <input type="hidden" value="<?php echo $page;?>" name="pageValue" id="pageValue"/>
	<!-- ================ category section end ================= -->		  

	<!-- ================ top product area start ================= -->	
	<!--<section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Top <span class="section-intro__style">Product</span></h2>
      </div>
			<div class="row mt-30">
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-4.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-5.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-6.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-7.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-8.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-9.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</section>-->
	
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
	
	$('.sorting').on('change', function (e) {
		var sortval = $( "#sortBy option:selected" ).val();
		document.getElementById("sortValue").value = sortval;
		
	});
	
	$("input[name=subcategory]:radio").change(function () {
		var catval = $('input[name=subcategory]:checked').val();
		document.getElementById("categoryValue").value = catval;
	});
	
	
	
	$(document).on('click', '#apply', function(){
		$("#prodData").empty();
		
		var sort = $("#sortValue").val();
		var cat = $("#categoryValue").val();
		var pg = $("#pageValue").val();
		$.get('sort.php',{ss:sort,cc:cat,page:pg},function(data){
			 $("#prodData").append(data);
		});
	});
	
});	
</script>
	<!-- ================ top product area end ================= -->	
	<!--<section>
		<div class="container">
    		<div class="row">
    		
		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
					</div>
				</div>
			</div>
		</div>
	</section>-->
</body>
</html>