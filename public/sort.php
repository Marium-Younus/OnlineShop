<?php

	extract($_REQUEST);

	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	if(!empty($cc)){
		if($cc=='all'){
			if(!empty($srch)){
				$catConcat = " WHERE tags LIKE '%".$srch."%' OR name LIKE '%".$srch."%'";
			}
			else{
				$catConcat = "";
			}
		}
		else{
				if(!empty($srch)){
					$catConcat = " WHERE category =".$cc." AND tags LIKE '%".$srch."%' OR name LIKE '%".$srch."%'";
				}
				else{
					$catConcat = " WHERE category =".$cc;
				}
			}
	}
	else{
		if(!empty($srch)){
					$catConcat = " WHERE tags LIKE '%".$srch."%' OR name LIKE '%".$srch."%'";
				}
				else{
					$catConcat = "";
				}
	}

	if(!empty($ss)){
		$sortConcat = " ORDER BY price ".$ss;
	}
	else{
		$sortConcat = "";
	}

	
	$con=mysqli_connect('localhost','root','','onlineshopdb');

		$init="SELECT * FROM `products`";
		$query = $init . $catConcat . $sortConcat;
		$result=$con->query($query);
		foreach($result as $p){
					
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
						  <li><button onclick="location.href = \'product.php?ID='.$p['id'].'\';"><i class="ti-shopping-cart"></i></button></li>
						</ul>
					  </div>
					  <div class="card-body">
						<p style="text-transform:uppercase;">'.$cat['name'].'</p>
						<h4 class="card-product__title"  style="text-transform: capitalize"><a href="product.php?ID='.$p['id'].'">'.$p['name'].'</a></h4>
						<p class="card-product__price">$'.$p['price'].'</p>
					  </div>
					</div>
					
				  </div>
				  
					';
		}
	
	
?>