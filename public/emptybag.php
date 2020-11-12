<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your Bag is Empty</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
	
	.notif{
		display: table;
  		margin-right: auto;
  		margin-left: auto;
		align-items: center;
	}	
	.btnbox{
		display: table;
		margin-right:auto;
		margin-left: auto;
		align-items: center;
		font-family: Adequate ExtraLight;
	}
	.browse{
		font-size: 20px;
		font-weight: bold;
		color:#83464C;
	}
</style>
</head>
<?php

	include('header.php');
	
?>
<body>
<body>
<div class="notif">
	<img src="images/layout/empty_bag.png"/>
	
</div>
<div class="btnbox" style="margin-bottom: 10%;">
	<a class="browse" href="products.php?page=1">CONTINUE  BROWSING</a>
</div>
<?php include('footer.php');?>
</body>
</html>