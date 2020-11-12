<!doctype html>
<html style="height: 100%;">
<head>
<meta charset="utf-8">
<link rel="icon" href="images/layout/JY-logo.png" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
   <script src="assets/canvasjs-2.3.2/canvasjs.min.js"></script>
    <!-- Dashboard CSS -->
    <!-- chartist CSS -->
    <link href="assets/dashboard/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="assets/dashboard/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/dashboard/dist/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="assets/dashboard/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="assets/main.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick.css">
<link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick-theme.css">

<!--Side nav css-->
<link href="assets/dash.css" rel="stylesheet">

<title>Dashboard</title>
<style>
	.NoDisplay{
		display: none;
		height: 0px;
		width: 0px;
	}
	.navbar{
		font-family: Rubik,sans-serif;
		background-color: #262626 !important;
		font-size: 0.93rem;
		font-weight: 400;
		line-height: 1.5;
	}
	.bg-primary{
		background-color: #262626 !important;
	}
	.card{
		border-radius: 0rem !important;
		border: none !important;
		box-shadow: 1px 1px 3px 0.5px #ccc;
	}
</style>
</head>
<?php
session_start();
	
	include('../includes/db.php');
	$db = new db();
	include('../includes/config.php');
	$config = new config();
	include('../includes/hp_db.php');
	$hp_db = new hp_db();
	
	$config->Authenticate("Employee");
	if(!isset($_SESSION['userID'])){
		echo '<script> location.replace("index.php"); </script>';
	}
	else{
		$id = $_SESSION['userID'];
		$role = $_SESSION['userRole'];
	}
	
	$conditions['where'] = array('UserId' => $id,);
	$conditions['return_type'] = 'single';
	$emp = $hp_db->getRows('empinfo', $conditions);
	
	$conditions['where'] = array('Id' => $role,);
	$conditions['return_type'] = 'single';
	$r = $hp_db->getRows('roles', $conditions);
	
	
	$con=mysqli_connect('localhost','root','','onlineshopdb');
?>
<body style="height: 100%;" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    
    <a class="nav-link js-scroll-trigger" href="#overview" style="color: white; text-align: left;"><span style=" font-size: 20px;"><?php echo $emp['FirstName'].' '.$emp['LastName']?></span><span style="font-size: 10;font-style: italic;"> (<?php echo $r['Name'];?>)</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav" style="border-top: 1px solid #B2B2B2;padding-top: 1rem; margin-top: 3%;">
        <li class="nav-item" <?php if($role==2){echo 'style="display:none"';}?>>
         
          <a class="nav-link js-scroll-trigger" href="#overview"><i class="fa fa-tachometer" style="margin-right: 30px;"></i>Overview</a>
        </li>
        <li class="nav-item" <?php if($role==2){echo 'style="display:none"';}?>>
          <a class="nav-link js-scroll-trigger" href="#reports"><i class="fa fa-table" style="margin-right: 30px;"></i>Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#orders"><i class="fa fa-shopping-bag" style="margin-right: 30px;"></i>Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#inventory"><i class="fa fa-cubes" style="margin-right: 26px;"></i>Inventory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#newproduct"><i class="fa fa-plus-square-o" style="margin-right: 32px;"></i>Add New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#layout"><i class="fa fa-edit" style="margin-right: 32px;"></i>Layout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="logout.php"><i class="fa fa-sign-out" style="margin-right: 30px;"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
 
 <!--=============================Overview Page Satyt==================================-->
	<div class="container-fluid p-0" <?php if($role==2){echo 'style="display:none"';}?>>
		<section class="resume-section p-3 d-flex" id="overview">
		<div class="container-fluid">
		<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
			<div class="col-sm-12"><h4 style="font-weight: 400;">Overview</h4></div>
		</div>
			<div class="row" style="margin-top:3%;">
                    <div class="col-lg-4">
                        <div class="card oh">
                            <div class="card-body">
                            <div class="row">
                            	<div class="col-sm-2">
                            		<img src="images/layout/top-selling.png" style="height:40px;"/>
                            	</div>
                            	<div class="col-sm-10">
                            	<?php /*Get the most popular product and top customer*/
								$q8="SELECT p.name as 'product',sum(o.prodAmt) as 'amt' FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category GROUP BY prodId ORDER BY amt DESC LIMIT 1";
								$r8=$con->query($q8); $top=0;
								foreach($r8 as $r){
									$top = $r['product'];
								}
		
								$q9="SELECT u.FirstName as 'fn',u.LastName as 'ln',sum(o.prodAmt) as 'amt' FROM `orders` o JOIN userinfo u on u.UserId=o.UserId GROUP BY o.UserId ORDER BY amt DESC LIMIT 1";
								$r9=$con->query($q9); $fn=""; $ln="";
								foreach($r9 as $r){
									$fn = $r['fn'];
									$ln = $r['ln'];
								}
								?>
                           		<a class="nav-link js-scroll-trigger" href="#reports" style="padding: 0px;">
                            		<h6 style="color: #83464C; font-weight: 400;">Top Product:</h6>
                            		<h6><?php echo $top; ?></h6>
								</a>
                            	</div>
                            </div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
                        <div class="card oh">
                            <div class="card-body">
                            <div class="row">
                            	<div class="col-sm-2">
                            		<img src="images/layout/top-customer.png" style="height:35px;"/>
                            	</div>
                            	<div class="col-sm-10">
                            	<a class="nav-link js-scroll-trigger" href="#prntUsers" style="padding: 0px;">
                            		<h6 style="color: #83464C; font-weight: 400;">Top Customer:</h6>
                            		<h6><?php echo $fn.' '.$ln;?></h6>
								</a>
                            	</div>
                            </div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
                        <div class="card oh">
                            <div class="card-body">
                            <div class="row">
                            	<div class="col-sm-2">
                            		<img src="images/layout/pending.png" style="height:40px;"/>
                            	</div>
                            	<?php /*Calculate pending orders*/
								$q1="SELECT COUNT(`orderStatus`) as 'pending' FROM `orders` WHERE `orderStatus`=1";
								$con=mysqli_connect('localhost','root','','onlineshopdb');
								$r1=$con->query($q1); $pending=0;
								foreach($r1 as $r){
									$pending = $r['pending'];
								}
								?>
                            	<div class="col-sm-10">
                            	<a class="nav-link js-scroll-trigger" href="#orders" style="padding: 0px;">
                            		<h6 style="color: #83464C; font-weight: 400;">Pending Orders:</h6>
                            		<h6><?php if($pending==0){echo "No new orders.";}else{echo $pending;} ?></h6>
                            	</a>
                            	</div>
                            </div>
							</div>
						</div>
					</div>
			</div>
				<!--======Sales======-->
				<div class="row" style="margin-top:3%;">
                    <div class="col-lg-8">
                        <div class="card oh">
                            <div class="card-body">
                                <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Sales</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                           <input type="radio" name="sales" value="1"> Quarterly
											<input type="radio" name="sales" value="2" checked="checked"> Monthly
											<input type="radio" name="sales" value="3" checked="checked"> Daily
                                        </ul>
                                    </div>
                                </div>
                                
                                <div id="chartContainer" style="height: 295px;">Select category to view chart.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="container-fluid">
                    <?php /*Get the total products sold and total by category*/
						$q5="SELECT SUM(`prodAmt`) as 'units' FROM `orders`";
						$r5=$con->query($q5); $units=0;
						foreach($r5 as $r){
							$units = $r['units'];
						}
						
						$q6="SELECT sum(o.prodAmt) as 'amt' FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category WHERE c.id = '1'";
						$r6=$con->query($q6); $makeup=0;
						foreach($r6 as $r){
							$makeup = $r['amt'];
						}
						
						$q7="SELECT sum(o.prodAmt) as 'amt' FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category WHERE c.id = '2'";
						$r7=$con->query($q7); $jewel=0;
						foreach($r7 as $r){
							$jewel = $r['amt'];
						}
					?>
						<div class="row">
						<div class="col-sm-12" style="padding: 0px;">
							<div class="card oh">
								<div class="card-body" style="padding-bottom: -3%;">
								<h5 style="color: #83464C; font-weight: 400;">Units Sold</h5>
								<p><?php echo $units; ?></p>
								<div class="row">
									<div class="col-sm-6" style="border-right: 1px solid #DDDDDD"><h6>Cosmetics</h6><p><?php echo $makeup; ?></p></div>
									<div class="col-sm-6"><h6>Jewelry</h6><p><?php echo $jewel; ?></p></div>
								</div>
								</div>
							</div>
						</div>
						</div>
						<?php /*Calculate Active users and count according to gender*/
						$q2="SELECT COUNT(`Id`) as 'users' FROM `userinfo`";
						$r2=$con->query($q2); $users=0;
						foreach($r2 as $r){
							$users = $r['users'];
						}
						
						$q3="SELECT COUNT(`Id`) as 'females' FROM `userinfo` WHERE Gender = 1";
						$r3=$con->query($q3); $female=0;
						foreach($r3 as $r){
							$female = $r['females'];
						}
						
						$q4="SELECT COUNT(`Id`) as 'males' FROM `userinfo` WHERE Gender = 2";
						$r4=$con->query($q4); $male=0;
						foreach($r4 as $r){
							$male = $r['males'];
						}
						?>
						<div class="row" style="height: auto; margin-top: 4%;">
						<div class="col-sm-12" style="padding: 0px;">
							<div class="card oh">
								<div class="card-body" style="padding-bottom: -3%;">
								<h5 style="color: #83464C; font-weight: 400;">Active Users</h5>
								<p><?php echo $users; ?></p>
								<div class="row">
									<div class="col-sm-6" style="border-right: 1px solid #DDDDDD"><h6>Female</h6><p><?php echo $female; ?></p></div>
									<div class="col-sm-6"><h6>Male</h6><p><?php echo $male; ?></p></div>
								</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					</div>
			</div>
				<!--======Sales End======-->
		</div>

		</section>
	</div>
	<input type="hidden" id="salesSelection" value="3"/>
<script>

$(document).ready(function(e) {
	
	$("input[name=sales]:radio").change(function () {
		var saleval = $('input[name=sales]:checked').val();
		
		$("#chartContainer").empty();
		$.get('sales.php',{ss:saleval},function(data){
			 $("#chartContainer").append(data);
			
		});
	});
	
	
});
</script>
	<!--=============================Overview Page End==================================-->
	
	<!--=============================Reports Page Start==================================-->
	<div class="container-fluid p-0" <?php if($role==2){echo 'style="display:none"';}?>>
		<section class="resume-section p-3 d-flex" id="reports">
			<div class="container-fluid">
			<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
				<div class="col-sm-12"><h4 style="font-weight: 400;">Reports</h4></div>
			</div>
			<!--Products Table and Editor-->
			<div class="row" style="margin-top:3%;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get the most sold products*/
							$t1="SELECT i.path as 'path',i.name as 'image',p.id as 'ID',p.name as 'Product',SUM(prodAmt) as 'Sold', c.name as 'Category', p.price as 'price',p.detail as 'detail',p.tags as 'tags' FROM orders o JOIN products p on p.id=o.prodId JOIN imglink l ON l.ProdId = p.id JOIN images i ON i.id=l.imgId JOIN subcategory c on c.id=p.category GROUP BY o.prodId ORDER BY Sold DESC LIMIT 10";
							$tr1=$con->query($t1);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Products - <a href="" id="prntProd"><i class="fa fa-print"></i></a></h5>
                                    
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                         <span class="srch">
										  <select id="srchBy" style="height: 24px;">
											<option value="1" selected>Product</option>
											<option value="2">Category</option>
											<option value="3">Price</option>
										  </select>
										</span>
                                          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                                           <input type="radio" name="prodList" value="1" checked="checked"> Top Selling 
											<input type="radio" name="prodList" value="2"> All
                                        </ul>
                                    </div>
                                </div> 
                             <div id="prodTbl">
                            <table class="table table-hover table-borderless" id="products" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Product</th>
                            		<th>Category</th>
                            		<th>Price ($)</th>
                            		<th>Sold</th>
                            	</tr>
                            	<?php foreach($tr1 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['ID'].'</td>
									<td>'.$t['Product'].'</td>
									<td>'.$t['Category'].'</td>
									<td>'.$t['price'].'</td>
									<td>'.$t['Sold'].'</td>
									<td style="display:none;">'.$t['path'].'</td>
									<td style="display:none;">'.$t['image'].'</td>
									<td style="display:none;">'.$t['detail'].'</td>
									<td style="display:none;">'.$t['tags'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				<!--Product Editor Form-->
				<div class="row" id="topProdDetails" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="prodForm" name="prodForm" class="form-horizontal form-material">
                            <div class="row">
                            	<div class="col-sm-3" style="border-right: 1px solid #E3E3E3;text-align: center; margin-top: 2%;">
                            		<div id="imgPreview" style="height: auto;"></div>
   									<p id="imgNm"></p><br>
                            	</div>
                            	<div class="col-sm-4" style="border-right: 1px solid #E3E3E3;margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Product Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="prodNm" required>
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Price</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line priceCheck" id="prc" required>
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Category</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="cat" required>
                                        </div>
                                    </div>
                                    
                            	</div>
                            	<div class="col-sm-5" style="margin-top:2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Details</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 80px;" id="det" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tags</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 73px;" id="tag" required></textarea>
                                        </div>
                                    </div>
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		<input class="btn btn-dark" type="button" value="Delete" style="width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="dltProd"/>
                            		<input class="btn btn-dark" type="button" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtProd"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclUpdtProd"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
					
					
					<!--Customers Table and Editor-->
					<div class="row" style="">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get tho most spending customers*/
							$t2="SELECT u.UserId as 'id',u.PhoneNumber as 'number',u.Address as 'address',u.City as 'city',u.Country as 'country',u.FirstName as 'fn',u.LastName as 'ln',sum(o.prodAmt) as 'amt', s.Email as 'email' FROM `orders` o JOIN userinfo u on u.UserId=o.UserId JOIN users s ON s.Id=u.UserId GROUP BY o.UserId ORDER BY amt DESC LIMIT 10";
							$tr2=$con->query($t2);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Customers - <a href="" id="prntUsers"><i class="fa fa-print"></i></a></h5>
                                    
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                         <span class="srchUsr">
										  <select id="srchUsrBy" style="height: 24px;">
											<option value="1" selected>Name</option>
											<option value="2">Number</option>
											<option value="3">Address</option>
										  </select>
										</span>
                                          <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search.." title="Type in a name">
                                           <input type="radio" name="userList" value="1" checked="checked"> Top Customers 
											<input type="radio" name="userList" value="2"> All
                                        </ul>
                                    </div>
                                </div> 
                             <div id="usersTbl">
                            <table class="table table-hover table-borderless" id="users" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Name</th>
                            		<th>Number</th>
                            		<th>Address</th>
                            		<th>Email</th>
                            		<th>Purchases</th>
                            	</tr>
                            	<?php foreach($tr2 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['id'].'</td>
									<td>'.$t['fn'].' '.$t['ln'].'</td>
									<td>'.$t['number'].'</td>
									<td>'.$t['address'].', '.$t['city'].', '.$t['country'].'</td>
									<td>'.$t['email'].'</td>
									<td style="display:none;">'.$t['fn'].'</td>
									<td style="display:none;">'.$t['ln'].'</td>
									<td style="display:none;">'.$t['address'].'</td>
									<td style="display:none;">'.$t['city'].'</td>
									<td style="display:none;">'.$t['country'].'</td>
									<td>'.$t['amt'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Customers Editor Form-->
				<div class="row" id="userDetails" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="userForm" name="userForm" class="form-horizontal form-material">
                            <div class="row">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="fN" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="lN" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line numberCheck" id="pN" required>
                                        </div>
									</div>
                           		<div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" id="eM" required>
                                        </div>
									</div>
                            	</div>
                            	<div class="col-sm-6" style="margin-top:2%;">
                            		
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 117px;" id="aD" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">City</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="cT" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Country</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="cN" required>
                                        </div>
									</div>
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		<input class="btn btn-dark" type="button" value="Delete" style="width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="dltUser"/>
                                  <input class="btn btn-dark" type="button" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtUser"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclUpdtUser"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
					
					<!--Employees Table and Editor-->
					<div class="row" style="">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get tho most spending customers*/
							$t3="SELECT u.UserId as 'id',u.PhoneNumber as 'number',u.Address as 'address',u.City as 'city',u.Country as 'country',u.FirstName as 'fn',u.LastName as 'ln', s.Email as 'email', rl.Name as 'role' FROM empinfo u JOIN users s ON s.Id=u.UserId JOIN userroles r ON r.UserId=u.UserId JOIN roles rl ON rl.Id=r.RoleId ORDER BY Id";
							$tr3=$con->query($t3);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Employees - <a href="#" id="prntEmp"><i class="fa fa-print"></i></a></h5>
                                    
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                         <span class="srchEmp">
										  <select id="srchEmpBy" style="height: 24px;">
											<option value="1" selected>Name</option>
											<option value="10">Role</option>
											<option value="2">Number</option>
											<option value="3">Address</option>
										  </select>
										</span>
                                          <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search.." title="Type in a name">
                                        </ul>
                                    </div>
                                </div> 
                             <div id="empTbl">
                            <table class="table table-hover table-borderless" id="employees" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Name</th>
                            		<th>Number</th>
                            		<th>Address</th>
                            		<th>Email</th>
                            		<th>Role</th>
                            	</tr>
                            	<?php foreach($tr3 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['id'].'</td>
									<td>'.$t['fn'].' '.$t['ln'].'</td>
									<td>'.$t['number'].'</td>
									<td>'.$t['address'].', '.$t['city'].', '.$t['country'].'</td>
									<td>'.$t['email'].'</td>
									<td style="display:none;">'.$t['fn'].'</td>
									<td style="display:none;">'.$t['ln'].'</td>
									<td style="display:none;">'.$t['address'].'</td>
									<td style="display:none;">'.$t['city'].'</td>
									<td style="display:none;">'.$t['country'].'</td>
									<td>'.$t['role'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Employees Editor Form-->
				<div class="row" id="empDetails" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="empForm" name="empForm" class="form-horizontal form-material">
                            <div class="row">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="efN" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="elN" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line numberCheck" id="epN" required>
                                        </div>
									</div>
                           		<div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" id="eeM" required>
                                        </div>
									</div>
                            	</div>
                            	<div class="col-sm-6" style="margin-top:2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Role</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="erL" required>
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 38px" id="eaD" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">City</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="ecT" required>
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Country</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="ecN" required>
                                        </div>
									</div>
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		<input class="btn btn-dark" type="button" value="Delete" style="width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="dltEmp"/>
                                  <input class="btn btn-dark" type="button" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtEmp"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclUpdtEmp"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</section>
	</div>
	<input type="hidden" value="" id="prodId"/>
	<input type="hidden" value="" id="usId"/>
	<input type="hidden" value="" id="eId"/>
<script>

		var srchCol=1; //Selecting which field to search in products
		$('.srch').on('change', function (e) {
		var sortval = $( "#srchBy option:selected" ).val();
		srchCol = sortval;
		
		});
		
function myFunction() { //Searching from the selected field
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("products");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[srchCol];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	var srchUCol=1; //Selecting which field to search in Users
		$('.srchUsr').on('change', function (e) {
		var sortUval = $( "#srchUsrBy option:selected" ).val();
		srchUCol = sortUval;
		
		});			
function myFunction2() { //Searching from the selected column
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("users");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[srchUCol];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	
	var srchECol=1; //Selecting which field to search in employees
		$('.srchEmp').on('change', function (e) {
		var sortEval = $( "#srchEmpBy option:selected" ).val();
		srchECol = sortEval;
		
		});
		
function myFunction3() { //Searching from the selected field
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("employees");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[srchECol];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
var table = document.getElementById('products'); //Get Values from Product Table into form               
for(var i = 1; i < table.rows.length; i++)
	{
		table.rows[i].onclick = function()
		{
			$('#topProdDetails').fadeIn(300);
			document.getElementById("prodId").value = this.cells[0].innerHTML;
			var path = this.cells[5].innerHTML;
			var img = this.cells[6].innerHTML;
			$('#imgPreview').html('<img style="height: 200px; width: 200px;" src="'+path+img+'"/>');
			$('#imgNm').html(img);
			document.getElementById("prodNm").value = this.cells[1].innerHTML;
			document.getElementById("prc").value = this.cells[3].innerHTML;
			document.getElementById("cat").value = this.cells[2].innerHTML;
			document.getElementById("det").value = this.cells[7].innerHTML;
			document.getElementById("tag").value = this.cells[8].innerHTML;
		};
	}
		
var table2 = document.getElementById('users'); //Get values from Users table into form           
for(var i = 1; i < table2.rows.length; i++)
	{
		table2.rows[i].onclick = function()
		{
			$('#userDetails').fadeIn(300);
			document.getElementById("usId").value = this.cells[0].innerHTML;
			document.getElementById("fN").value = this.cells[5].innerHTML;
			document.getElementById("lN").value = this.cells[6].innerHTML;
			document.getElementById("pN").value = this.cells[2].innerHTML;
			document.getElementById("eM").value = this.cells[4].innerHTML;
			document.getElementById("aD").value = this.cells[7].innerHTML;
			document.getElementById("cT").value = this.cells[8].innerHTML;
			document.getElementById("cN").value = this.cells[9].innerHTML;
			
		};
	}
	
var table3 = document.getElementById('employees'); //Get values from Employees table into form              
for(var i = 1; i < table3.rows.length; i++)
	{
		table3.rows[i].onclick = function()
		{
			$('#empDetails').fadeIn(300);
			document.getElementById("eId").value = this.cells[0].innerHTML;
			document.getElementById("efN").value = this.cells[5].innerHTML;
			document.getElementById("elN").value = this.cells[6].innerHTML;
			document.getElementById("epN").value = this.cells[2].innerHTML;
			document.getElementById("eeM").value = this.cells[4].innerHTML;
			document.getElementById("eaD").value = this.cells[7].innerHTML;
			document.getElementById("ecT").value = this.cells[8].innerHTML;
			document.getElementById("ecN").value = this.cells[9].innerHTML;
			document.getElementById("erL").value = this.cells[10].innerHTML;
		};
	}
	
$(document).ready(function(e) {
	
	$("input[name=prodList]:radio").change(function () {
		var plval = $('input[name=prodList]:checked').val();
		
		$("#prodTbl").empty();
		$.get('getProducts.php',{pp:plval},function(data){
			 $("#prodTbl").append(data);
			
		});
	});
	
	$(document).on('click', '#updtProd', function(){
		
		var id = $("#prodId").val();
		var nm = $("#prodNm").val();
		var pr = $("#prc").val();
		var ct = $("#cat").val();
		var dt = $("#det").val();
		var tg = $("#tag").val();
		
		$.get('updateProduct.php',{ii:id,nn:nm,pp:pr,cc:ct,dd:dt,tt:tg},function(data){
			 
		});
		
		$('#topProdDetails').fadeOut(300);
	});
	$(document).on('click', '#dltProd', function(){
		
		var id = $("#prodId").val();
		$.get('dltProd.php',{ii:id},function(data){
			 
		});
		
		$('#topProdDetails').fadeOut(300);
	});
	
	$(document).on('click', '#cnclUpdtProd', function(){
		$('#topProdDetails').fadeOut(300);
	});
	
	$(document).on('click', '#updtUser', function(){
		var ud = $("#usId").val();
		var fn = $("#fN").val();
		var ln = $("#lN").val();
		var pn = $("#pN").val();
		var em = $("#eM").val();
		var ad = $("#aD").val();
		var ct = $("#cT").val();
		var cn = $("#cN").val();
		
		$.get('updateUser.php',{uu:ud,ff:fn,ll:ln,pp:pn,ee:em,aa:ad,tt:ct,cc:cn},function(data){
			 
		});
		
		$('#userDetails').fadeOut(300);
	});
	
	$(document).on('click', '#updtEmp', function(){
		var ud = $("#eId").val();
		var fn = $("#efN").val();
		var ln = $("#elN").val();
		var pn = $("#epN").val();
		var em = $("#eeM").val();
		var ad = $("#eaD").val();
		var ct = $("#ecT").val();
		var cn = $("#ecN").val();
		
		$.get('updateEmp.php',{uu:ud,ff:fn,ll:ln,pp:pn,ee:em,aa:ad,tt:ct,cc:cn},function(data){
			 
		});
		
		$('#empDetails').fadeOut(300);
	});
	
	$(document).on('click', '#dltUser', function(){
		
		var ud = $("#usId").val();
		$.get('dltUser.php',{uu:ud},function(data){
			 
		});
		
		$('#userDetails').fadeOut(300);
	});
	
	$(document).on('click', '#dltEmp', function(){
		
		var ud = $("#eId").val();
		$.get('dltEmp.php',{uu:ud},function(data){
			 
		});
		
		$('#empDetails').fadeOut(300);
	});
	
	$(document).on('click', '#cnclUpdtUser', function(){
		$('#userDetails').fadeOut(300);
	});
	$(document).on('click', '#cnclUpdtEmp', function(){
		$('#empDetails').fadeOut(300);
	});
	$("input[name=userList]:radio").change(function () {
		var ulval = $('input[name=userList]:checked').val();
		
		$("#usersTbl").empty();
		$.get('getUsers.php',{uu:ulval},function(data){
			 $("#usersTbl").append(data);
			
		});
	});
	
		

		

});

	</script>
    <!--=============================Reports Page End==================================-->
    
    <!--=============================Orders Page Start==================================-->
	<div class="container-fluid p-0">
		<section class="resume-section p-3 d-flex" id="orders">
			<div class="container-fluid">
			<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
				<div class="col-sm-12"><h4 style="font-weight: 400;">Orders</h4></div>
			</div>
			
			
			<!--Pending Orders List-->
				<div class="row"  style="margin-top:3%;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get All Orders*/
							$t4="SELECT b.address as 'address',u.PhoneNumber as 'ph',m.method as 'payment',o.id as 'id',o.orderId as 'orderno',p.name as 'product',o.prodAmt as 'amt',o.total as 'total',u.FirstName as 'fn',u.LastName as 'ln', s.status as 'status' FROM orders o JOIN userinfo u ON u.UserId=o.UserId JOIN users r ON r.Id=u.UserId JOIN products p ON p.id=o.prodId JOIN orderstatus s on s.id=o.orderStatus JOIN bills b on b.orderId=o.orderId JOIN paymentmethod m ON m.id=b.payment ORDER BY status DESC";
							$tr4=$con->query($t4);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Orders - <a href="#" id="prntOrders"><i class="fa fa-print"></i></a></h5>
                                    
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                         <span class="srchOrders">
										  <select id="srchOrdersBy" style="height: 24px;">
											<option value="1" selected>Order No.</option>
											<option value="6">Order Status</option>
											<option value="2">Product</option>
											<option value="5">Customer</option>
										  </select>
										</span>
                                          <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search.." title="Type in a name">
                                        </ul>
                                    </div>
                                </div> 
                             <div id="ordersTbl">
                            <table class="table table-hover table-borderless" id="ordersList" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Order No.</th>
                            		<th>Product</th>
                            		<th>Qty</th>
                            		<th>Total ($)</th>
                            		<th>Order By</th>
                            		<th>Status</th>
                            	</tr>
                            	<?php foreach($tr4 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['id'].'</td>
									<td>'.$t['orderno'].'</td>
									<td>'.$t['product'].'</td>
									<td>'.$t['amt'].'</td>
									<td>'.$t['total'].'</td>
									<td>'.$t['fn'].' '.$t['ln'].'</td>
									<td>'.$t['status'].'</td>
									<td style="display:none;">'.$t['address'].'</td>
									<td style="display:none;">'.$t['ph'].'</td>
									<td style="display:none;">'.$t['payment'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				
				<!--View and print Order Details-->
				<div class="row" id="ordersDetails" style="display: none">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="ordersForm" name="ordersForm" class="form-horizontal form-material">
                            <div class="row" id="orderSlip">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Order Number:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="orderNo" disabled style="background-color: transparent;">
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Recipent:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="recipient" disabled style="background-color: transparent;">
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Address:</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line"  id="address" disabled style="background-color: transparent; height: 38px;"></textarea>
                                        </div>
                                    </div>
                           		
                            	</div>
                            	<div class="col-sm-6" style="margin-top:2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Product:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="orderedProduct" disabled style="background-color: transparent;">
                                        </div>
									</div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Total:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="orderTotal" disabled style="background-color: transparent;">
                                        </div>
									</div>
                           			<div class="form-group">
                                        <label class="col-md-12">Payment Method:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="paymentMethod" disabled style="background-color: transparent;">
                                        </div>
									</div>
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		<input class="btn btn-dark" type="button" value="Print Slip" style="width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="printOrder"/>
                            		<input class="btn btn-dark" type="button" value="Accept" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="acceptOrder"/>
                                  <input class="btn btn-dark" type="button" value="Decline" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="declineOrder"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclOrder"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
					
					<!--Change Order Details-->
				<div class="row" id="chngOrdersDetails" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="chngOrdersForm" name="chngOrdersForm" class="form-horizontal form-material">
                            
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		
                            		<input class="btn btn-dark" type="button" value="Delivered" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="delivered"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclChngOrder"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
			</div>
		</section>
	</div>
	<input type="hidden" value="" id="orderId"/>
<script>
var srchPCol=1; //Selecting which field to search in orders
$('.srchOrders').on('change', function (e) {
	var sortPval = $( "#srchOrdersBy option:selected" ).val();
	srchPCol = sortPval;
});
		
function myFunction4() { //Searching from the selected field
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("ordersList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[srchPCol];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	
var table4 = document.getElementById('ordersList'); //Get Values from Orders Table into form               
for(var i = 1; i < table4.rows.length; i++)
	{
		table4.rows[i].onclick = function()
		{
			if(this.cells[6].innerHTML=="Pending"){
				$('#chngOrdersDetails').fadeOut(300);
				$('#ordersDetails').fadeIn(300);
				var recipient = this.cells[5].innerHTML;
				var phone = this.cells[8].innerHTML;
				var qty = this.cells[3].innerHTML;
				document.getElementById("orderId").value = this.cells[0].innerHTML;
				document.getElementById("orderNo").value = this.cells[1].innerHTML;
				document.getElementById("recipient").value = recipient+' (\Tel: '+phone+')';
				document.getElementById("address").value = this.cells[7].innerHTML;
				document.getElementById("orderedProduct").value = this.cells[2].innerHTML+'  '+'  '+'x'+qty;
				document.getElementById("orderTotal").value = '$'+this.cells[4].innerHTML;
				document.getElementById("paymentMethod").value = this.cells[9].innerHTML;
			}
			else if(this.cells[6].innerHTML=="En route"){
				document.getElementById("orderId").value = this.cells[0].innerHTML;
				$('#ordersDetails').fadeOut(300);
				$('#chngOrdersDetails').fadeIn(300);
			}
			else{
				$('#ordersDetails').fadeOut(300);
				$('#chngOrdersDetails').fadeOut(300);
			}
			
		};
	}
	
$(document).ready(function(e) {
	$(document).on('click', '#cnclOrder', function(){
		$('#ordersDetails').fadeOut(300);
	});
	
	$(document).on('click', '#cnclChngOrder', function(){
		$('#chngOrdersDetails').fadeOut(300);
	});
	
	$(document).on('click', '#acceptOrder', function(){
		var od = $("#orderId").val();
		var st = 3;
		$.get('orderSlip.php',{oo:od,ss:st},function(data){
			 
		});
		$.get('mailConfirmation.php',{oo:od},function(data){
			 
		});
		$('#ordersDetails').fadeOut(300);
		
	});
	
	$(document).on('click', '#declineOrder', function(){
		var od = $("#orderId").val();
		var st = 5;
		$.get('orderSlip.php',{oo:od,ss:st},function(data){
			 
		});
		
		$('#ordersDetails').fadeOut(300);
	});
	
	$(document).on('click', '#delivered', function(){
		var od = $("#orderId").val();
		var st = 4;
		$.get('orderSlip.php',{oo:od,ss:st},function(data){
			 
		});
		
		$('#chngOrdersDetails').fadeOut(300);
	});
});
</script>
    <!--=============================Orders Page End==================================-->
    
    <!--=============================Inventory Page Start==================================-->
	<div class="container-fluid p-0">
		<section class="resume-section p-3 d-flex" id="inventory">
			<div class="container-fluid">
			<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
				<div class="col-sm-12"><h4 style="font-weight: 400;">Inventory</h4></div>
			</div>
			
			<!--Inventory-->
				<div class="row"  style="margin-top:3%;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get All Inventory Items*/
							$t5="SELECT i.id as 'inventory',p.id as 'id',p.name as 'product',i.upper as 'upper',i.lower as 'lower',i.current as 'current',i.lastUpdated as 'date' FROM inventory i JOIN products p ON p.id=i.prodId ORDER BY current ASC";
							$tr5=$con->query($t5);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Inventory - <a href="#" id="prntInventory"><i class="fa fa-print"></i></a></h5>
                                    
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12" style="font-size: 12px;">
                                         <span class="srchInventory">
										  <select id="srchInventoryBy" style="height: 24px;">
											<option value="2" selected>Product</option>
											<option value="1">Product ID</option>
										  </select>
										</span>
                                          <input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="Search.." title="Type in a name">
                                        </ul>
                                    </div>
                                </div> 
                             <div id="inventoryTbl">
                            <table class="table table-hover table-borderless" id="inventoryList" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">inventory</th>
                            		<th>ID</th>
                            		<th>Product</th>
                            		<th>Upper Limit</th>
                            		<th>Lower Limit</th>
                            		<th>Current</th>
                            		<th>Last Updated</th>
                            	</tr>
                            	<?php foreach($tr5 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['inventory'].'</td>
									<td>'.$t['id'].'</td>
									<td>'.$t['product'].'</td>
									<td>'.$t['upper'].'</td>
									<td>'.$t['lower'].'</td>
									<td>'.$t['current'].'</td>
									<td>'.$t['date'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Change Order Details-->
				<div class="row" id="updateInventory" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="inventoryUpdate" name="inventoryUpdate" class="form-horizontal form-material">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group">
                                        <label class="col-md-12">ID:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="inventoryProd" disabled style="background-color: transparent;">
                                        </div>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
                                        <label class="col-md-12">Upper Limit:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line numberCheck" id="upperLimit">
                                        </div>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
                                        <label class="col-md-12">Lower Limit:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line numberCheck" id="lowerLimit">
                                        </div>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
                                        <label class="col-md-12" style="font-weight: bold;">Current:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line numberCheck" id="current" >
                                        </div>
										</div>
									</div>
									<div class="col-sm-4" style="display: flex;justify-content: flex-end;">
                            		
                            		<input class="btn btn-dark" type="button" value="Update" style="height:50%;margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtInventory"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="height:50%;margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclInventory"/>
                                    </div>
								</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
				
			</div>
		</section>
	</div>
	<input type="hidden" value="" id="inventoryId"/>
<script>
var srchICol=2; //Selecting which field to search in inventory
$('.srchInventory').on('change', function (e) {
	var sortIval = $( "#srchInventoryBy option:selected" ).val();
	srchICol = sortIval;
});
		
function myFunction5() { //Searching from the selected field
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput5");
  filter = input.value.toUpperCase();
  table = document.getElementById("inventoryList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[srchICol];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	
var table4 = document.getElementById('inventoryList'); //Get Values from Inventory Table into form               
for(var i = 1; i < table4.rows.length; i++)
	{
		table4.rows[i].onclick = function()
		{
			
				$('#updateInventory').fadeIn(300);
				document.getElementById("inventoryId").value = this.cells[0].innerHTML;
				document.getElementById("inventoryProd").value = this.cells[1].innerHTML;
				document.getElementById("upperLimit").value = this.cells[3].innerHTML;
				document.getElementById("lowerLimit").value = this.cells[4].innerHTML;
				document.getElementById("current").value = this.cells[5].innerHTML;
			
			
		};
	}
$(document).ready(function(e) {
	$(document).on('click', '#cnclInventory', function(){
		$('#updateInventory').fadeOut(300);
	});
	
	$(document).on('click', '#updtInventory', function(){
		var idd = $('#inventoryId').val();
		var ull = $('#upperLimit').val();
		var lll = $('#lowerLimit').val();
		var caa = $('#current').val();
		
		$.get('updateInventory.php',{ii:idd,uu:ull,ll:lll,cc:caa},function(data){
			 
		});
		
		$('#updateInventory').fadeOut(300);
	});
});
</script> 
    <!--=============================Inventory Page End==================================-->
    
    <!--=============================New Product Page Start==================================-->
	<div class="container-fluid p-0">
		<section class="resume-section p-3 d-flex" id="newproduct">
			<div class="container-fluid">
			<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
				<div class="col-sm-12"><h4 style="font-weight: 400;">Add New</h4></div>
			</div>
			
			<!--New Product Form-->
				<div class="row" id="newProdDetails" style="margin-top: 3%;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 2%;padding-right: 3%;padding-top: 2%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Add New Product</h5>
                            </div> 
                            <form id="newProdForm" name="newProdForm" class="form-horizontal form-material" action="addNewProduct.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="NewProductImage" value="NewProductImage" />
                            <div class="row">
                            <div class="col-sm-12" style=" margin-bottom: 1%; margin-left: 1.5%;">
                            		<input type="file" name="file" id="file">
                            	</div>
                           
							</div>
                            	<div class="row">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Product Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="prodName" name="prodName">
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Price</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line priceCheck" id="prodPrice" name="prodPrice">
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Category</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" id="category" name="category">
                                               <?php
												$query="SELECT * FROM `subcategory` ORDER BY `category` ASC";
												$result=$con->query($query);
												foreach($result as $r){
													echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
												}
												?>
                                            </select>
                                        </div>
                                    </div>
                                    
                            	</div>
                            	<div class="col-sm-6" style="margin-top:2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Details</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 80px;" id="prodDetails" name="prodDetails"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tags</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" style="height: 73px;" id="prodTags" name="prodTags"></textarea>
                                        </div>
                                    </div>
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		<input class="btn btn-dark" type="submit" value="Add New Product" style="width:180px;background-color:#83464C;border-radius: 0rem;border:none;" id="newProd" name="submit"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclNewProd"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
					
			<!--New Category Form-->
			<div class="row" id="newCategory">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 2%;padding-right: 3%;padding-top: 1%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Add New Category</h5>
                            </div> 
                            <form id="addCategory" name="addCategory" class="form-horizontal form-material">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
                                        <label class="col-md-12">Category:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="newCatName">
                                        </div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
                                        <label class="col-sm-12">Main Category</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" id="mainCategory" name="mainCategory">
                                               <?php
												$query2="SELECT * FROM `categories`";
												$result2=$con->query($query2);
												foreach($result2 as $r){
													echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
												}
												?>
                                            </select>
                                        </div>
                                    </div>
									</div>
									<div class="col-sm-4" style="display: flex;justify-content: flex-end;">
                            		
                            		<input class="btn btn-dark" type="button" value="Add Category" style="height:50%;margin-left:2%;width:180px;background-color:#83464C;border-radius: 0rem;border:none;" id="addCategory"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="height:50%;margin-left:3%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclCategory"/>
                                    </div>
								</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
			</div>
		</section>
	</div>
<script>
$(document).ready(function(e) {
	$(document).on('click', '#cnclNewProd', function(){
		document.getElementById("prodName").value = "";
		document.getElementById("prodPrice").value = "";
		document.getElementById("prodDetails").value = "";
		document.getElementById("prodTags").value = "";
		document.getElementById("file").value = "";
	});
	$(document).on('click', '#cnclCategory', function(){
		document.getElementById("newCatName").value = "";
	});
	$(document).on('click', '#addCategory', function(){
		var cat = $('#newCatName').val();
		var main = $( "#mainCategory option:selected" ).val();
		
		$.get('addCategory.php',{cc:cat,mm:main},function(data){
			 
		});
		
	});
});
</script>
    <!--=============================New Product Page End==================================-->
    
    <!--=============================Layout Page Start==================================-->
	<div class="container-fluid p-0">
		<section class="resume-section p-3 d-flex" id="layout">
			<div class="container-fluid">
			<div class="row" style="border-bottom: 1px solid #BEBEBE;padding-bottom: 0.9%;">
				<div class="col-sm-12"><h4 style="font-weight: 400;">Edit Layout</h4></div>
			</div>
			
			<!--Home Page Slider-->
				<div class="row"  style="margin-top:3%;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <?php /*Get All Slider Items*/
							$t6="SELECT s.`id`,i.path as 'path',i.name as 'image',s.`exc`,s.`title`,s.`detail`,s.`btn`,s.`src` FROM slider s JOIN images i ON s.image=i.id";
							$tr6=$con->query($t6);
							?>
                           <div class="d-flex m-b-30 align-items-center no-block" style="margin-bottom: 20px; padding-left: 1%;padding-right: 3%;">
                                    <h5 class="card-title" style="color: #83464C; font-weight: 400;">Home Page Slider</h5>
                                    
                                </div> 
                             <div id="sliderTbl">
                            <table class="table table-hover table-borderless" id="sliderList" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th style="display: none;">Image</th>
                            		<th>Exclaimation</th>
                            		<th>Title</th>
                            		<th>Details</th>
                            		<th>Button Text</th>
                            		<th>Source</th>
                            	</tr>
                            	<?php foreach($tr6 as $t){
								echo '<tr>
									<td style="display:none;">'.$t['id'].'</td>
									<td style="display:none;">'.$t['image'].'</td>
									<td style="display:none;">'.$t['path'].'</td>
									<td>'.$t['exc'].'</td>
									<td>'.$t['title'].'</td>
									<td>'.$t['detail'].'</td>
									<td>'.$t['btn'].'</td>
									<td>'.$t['src'].'</td>
								</tr>';
								}?>
                            </table>
                            </div>
							</div>
						</div>
					</div>
				</div>
				
			<!--Slider Editor Form-->
				<div class="row" id="sliderDetails" style="display: none;">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
                            <form id="sliderForm" name="sliderForm" class="form-horizontal form-material" action="updateSliderImg.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="NewSliderImage" value="NewSliderImage" />
                            <input type="hidden" value="" id="sliderId" name="sliderId"/>
                            <div class="row">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;text-align: center; margin-top: 2%;">
                            		<div id="sliderImgPreview" style="height: auto;"></div>
   									<p id="sliderImgNm"></p><br>
                           	<div class="form-group">
                                        <label class="col-md-12">Change Image:</label>
                                        <div class="col-md-12">
                                            <input type="file" name="sliderfile" id="sliderfile">
                                        </div>
									</div>
                            	</div>
                            	<div class="col-sm-6" style="margin-top: 2%;">
                            		<div class="form-group">
                                        <label class="col-md-12">Exc</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="exc" name="exc">
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="title" name="title">
                                        </div>
									</div>
                                    <div class="form-group">
                                        <label class="col-md-12">Details</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="details" name="details">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Button</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line alphabetCheck" id="sbutton" name="sbutton">
                                        </div>
									</div>
                                   <div class="form-group">
                                        <label class="col-md-12">Source</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="source" name="source">
                                        </div>
									</div>
                                    
                            	</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-sm-12" style="display: flex;justify-content: flex-end;">
                            		
                            		<input class="btn btn-dark" type="submit" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtSlider" name="updtSlider"/>
                                   <input class="btn btn-dark" type="button" value="Cancel" style="margin-left:2%;margin-right: 1%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="cnclUpdtSlider"/>
                                    </div>
                            		</div>
                            	</div>
                            </form>
							</div>
						</div>
					</div>
			
			<!--About Editor Form-->
				<div class="row" id="aboutDetails">
					<div class="col-sm-12">
						<div class="card oh">
                            <div class="card-body">
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
                            <form id="aboutForm" name="aboutForm" class="form-horizontal form-material" action="updateAbout.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="NewAboutImage" value="NewAboutImage" />
                            <div class="row">
                            	<div class="col-sm-6" style="border-right: 1px solid #E3E3E3;text-align: center; margin-top: 2%;">
                            		<div id="aboutImg1Preview" style="height: auto;"><img src="<?php echo $img1['path'].$img1['name'];?>" alt="" style="height: 400px;width: 350px"></div>
   									<p id="aboutImgNm1"><?php echo $img1['name'];?></p><br>
                           	<div class="form-group">
                                        <label class="col-md-12">Change Image:</label>
                                        <div class="col-md-12">
                                            <input type="file" name="about1file" id="about1file">
                                        </div>
									</div>
                           	<div class="row">
                            		<div class="col-sm-12" style="text-align: center;">
                            		
                            		<input class="btn btn-dark" type="submit" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtAbout1" name="updtAbout1"/>
                                    </div>
                            		</div>
                            	</div>
                            	<div class="col-sm-6" style="text-align: center; margin-top: 2%;">
                            		<div id="aboutImg2Preview" style="height: auto;"><img src="<?php echo $img2['path'].$img2['name'];?>" alt="" style="height: 400px;width: 350px"></div>
   									<p id="aboutImgNm2"><?php echo $img2['name'];?></p><br>
                           	<div class="form-group">
                                        <label class="col-md-12">Change Image:</label>
                                        <div class="col-md-12">
                                            <input type="file" name="about2file" id="about2file">
                                        </div>
									</div>
                           	<div class="row">
                            		<div class="col-sm-12" style="text-align: center;">
                            		
                            		<input class="btn btn-dark" type="submit" value="Update" style="margin-left:2%;width:90px;background-color:#83464C;border-radius: 0rem;border:none;" id="updtAbout2" name="updtAbout2"/>
                                    </div>
                            		</div>
                            	</div>
                            	</div>
                            	
                            	</div>
                            </form>
							</div>
						</div>
					</div>
			
			</div>
		</section>
	</div>
	
<script>
var table6 = document.getElementById('sliderList'); //Get Values from Product Table into form               
for(var i = 1; i < table6.rows.length; i++)
	{
		table6.rows[i].onclick = function()
		{
			$('#sliderDetails').fadeIn(300);
			document.getElementById("sliderId").value = this.cells[0].innerHTML;
			var path = this.cells[2].innerHTML;
			var img = this.cells[1].innerHTML;
			$('#sliderImgPreview').html('<img style="height: 350px; width: 350px;" src="'+path+img+'"/>');
			$('#sliderImgNm').html(img);
			document.getElementById("exc").value = this.cells[3].innerHTML;
			document.getElementById("title").value = this.cells[4].innerHTML;
			document.getElementById("details").value = this.cells[5].innerHTML;
			document.getElementById("sbutton").value = this.cells[6].innerHTML;
			document.getElementById("source").value = this.cells[7].innerHTML;
		};
	}
	
$(document).ready(function(e) {
	$(document).on('click', '#cnclUpdtSlider', function(){
		$('#sliderDetails').fadeOut(300);
	});
	 
});
</script>
    <!--=============================Layout Page End==================================-->
    
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/dashboard/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/dashboard/assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/dashboard/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/dashboard/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="assets/dashboard/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/dashboard/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/dashboard/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/dashboard/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/dashboard/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/dashboard/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/dashboard/assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/dashboard/assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="assets/dashboard/dist/js/dashboard1.js"></script>
<!-- Plugin JavaScript -->
<script src="assets/jquery.easing.min.js"></script>
<!-- Enable Scrolling -->
<script src="assets/dash.js"></script>
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
</script>
</body>
</html>