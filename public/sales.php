<html>
<head>
	<script src="assets/canvasjs-2.3.2/canvasjs.min.js"></script>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
    <meta content="utf-8" http-equiv="encoding" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
<div id="chartContainers" style="height: 300px; width: 100%;"></div>

<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$dd = date("Y-m-d");

$jm1="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-01-01' AND '2019-01-31') AND c.id = '2' GROUP BY c.name";
$r1=$con->query($jm1);
$j1=0;
if(empty($r1)){
	$j1=0;
}
else{
	foreach($r1 as $r){
		$j1=$r['amt'];
	}
}
$jm2="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-02-01' AND '2019-02-28') AND c.id = '2' GROUP BY c.name";
$r2=$con->query($jm2);
$j2=0;
if(empty($r2)){
	$j2=0;
}
else{
	foreach($r2 as $r){
		$j2=$r['amt'];
	}
}

$jm3="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-03-01' AND '2019-03-31') AND c.id = '2' GROUP BY c.name";
$r3=$con->query($jm3);
$j3=0;
if(empty($r3)){
	$j3=0;
}
else{
	foreach($r3 as $r){
		$j3=$r['amt'];
	}
}

$jm4="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-04-01' AND '2019-04-30') AND c.id = '2' GROUP BY c.name";
$r4=$con->query($jm4);
$j4=0;
if(empty($r4)){
	$j4=0;
}
else{
	foreach($r4 as $r){
		$j4=$r['amt'];
	}
}

$jm5="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-05-01' AND '2019-05-31') AND c.id = '2' GROUP BY c.name";
$r5=$con->query($jm5);
$j5=0;
if(empty($r5)){
	$j5=0;
}
else{
	foreach($r5 as $r){
		$j5=$r['amt'];
	}
}

$jm6="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-06-01' AND '2019-06-30') AND c.id = '2' GROUP BY c.name";
$r6=$con->query($jm6);
$j6=0;
if(!empty($r6)){
	foreach($r6 as $r){
		$j6=$r['amt'];
	}
}
else{
	
}

$jm7="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-07-01' AND '2019-07-31') AND c.id = '2' GROUP BY c.name";
$r7=$con->query($jm7);
$j7=0;
if(!empty($r7)){
	foreach($r7 as $r){
		$j7=$r['amt'];
	}
}
else{
	
}

$jm8="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-08-01' AND '2019-08-31') AND c.id = '2' GROUP BY c.name";
$r8=$con->query($jm8);
$j8=0;
if(!empty($r8)){
	foreach($r8 as $r){
		$j8=$r['amt'];
	}
}
else{
	
}

$jm9="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-09-01' AND '2019-09-30') AND c.id = '2' GROUP BY c.name";
$r9=$con->query($jm9);
$j9=0;
if(!empty($r9)){
	foreach($r9 as $r){
		$j9=$r['amt'];
	}
}
else{
	
}

$jm10="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-10-01' AND '2019-10-31') AND c.id = '2' GROUP BY c.name";
$r10=$con->query($jm10);
$j10=0;
if(!empty($r10)){
	foreach($r10 as $r){
		$j10=$r['amt'];
	}
}
else{
	
}

$jm11="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-11-01' AND '2019-11-30') AND c.id = '2' GROUP BY c.name";
$r11=$con->query($jm11);
$j11=0;
if(!empty($r11)){
	foreach($r11 as $r){
		$j11=$r['amt'];
	}
}
else{
	
}

$jm12="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-12-01' AND '2019-12-31') AND c.id = '2' GROUP BY c.name";
$r12=$con->query($jm12);
$j12=0;
if(!empty($r12)){
	foreach($r12 as $r){
		$j12=$r['amt'];
	}
}
else{
	
}



$cm1="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-01-01' AND '2019-01-31') AND c.id = '1' GROUP BY c.name";
$rc1=$con->query($cm1);
$c1=0;
if(!empty($rc1)){
	foreach($rc1 as $r){
		$c1=$r['amt'];
	}
}

$cm2="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-02-01' AND '2019-02-28') AND c.id = '1' GROUP BY c.name";
$rc2=$con->query($cm2);
$c2=0;
if(!empty($rc2)){
	foreach($rc2 as $r){
		$c2=$r['amt'];
	}
}

$cm3="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-03-01' AND '2019-03-31') AND c.id = '1' GROUP BY c.name";
$rc3=$con->query($cm3);
$c3=0;
if(!empty($rc3)){
	foreach($rc3 as $r){
		$c3=$r['amt'];
	}
}

$cm4="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-04-01' AND '2019-04-30') AND c.id = '1' GROUP BY c.name";
$rc4=$con->query($cm4);
$c4=0;
if(!empty($rc4)){
	foreach($rc4 as $r){
		$c4=$r['amt'];
	}
}

$cm5="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-05-01' AND '2019-05-31') AND c.id = '1' GROUP BY c.name";
$rc5=$con->query($cm5);
$c5=0;
if(!empty($rc5)){
	foreach($rc5 as $r){
		$c5=$r['amt'];
	}
}

$cm6="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-06-01' AND '2019-06-30') AND c.id = '1' GROUP BY c.name";
$rc6=$con->query($cm6);
$c6=0;
if(!empty($rc6)){
	foreach($rc6 as $r){
		$c6=$r['amt'];
	}
}

$cm7="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-07-01' AND '2019-07-31') AND c.id = '1' GROUP BY c.name";
$rc7=$con->query($cm7);
$c7=0;
if(!empty($rc7)){
	foreach($rc7 as $r){
		$c7=$r['amt'];
	}
}

$cm8="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-08-01' AND '2019-08-31') AND c.id = '1' GROUP BY c.name";
$rc8=$con->query($cm8);
$c8=0;
if(!empty($rc8)){
	foreach($rc8 as $r){
		$c8=$r['amt'];
	}
}

$cm9="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-09-01' AND '2019-09-30') AND c.id = '1' GROUP BY c.name";
$rc9=$con->query($cm9);
$c9=0;
if(!empty($rc9)){
	foreach($rc9 as $r){
		$c9=$r['amt'];
	}
}

$cm10="SELECT sum(o.prodAmt) as 'amt' FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-10-01' AND '2019-10-31') AND c.id = '1' GROUP BY c.name";
$rc10=$con->query($cm10);
$c10=0;
if(!empty($rc10)){
	foreach($rc10 as $r){
		$c10=$r['amt'];
	}
}

$cm11="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-11-01' AND '2019-11-30') AND c.id = '1' GROUP BY c.name";
$rc11=$con->query($cm11);
$c11=0;
if(empty($rc11)){
	$c11=0;
}
else{
	foreach($rc11 as $r){
		$c11=$r['amt'];
	}
}
$cm12="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-12-01' AND '2019-12-31') AND c.id = '1' GROUP BY c.name";
$rc12=$con->query($cm12);
$c12=0;
if(!empty($rc12)){
	foreach($rc12 as $r){
		$c12=$r['amt'];
	}
}


$jd="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where b.date = '$dd' AND c.id = '2' GROUP BY c.name";
$rjd=$con->query($jd);
$jdr=0;
if(!empty($rjd)){
	foreach($rjd as $r){
		$jdr=$r['amt'];
	}
}

$cd="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where b.date = '$dd' AND c.id = '1' GROUP BY c.name";
$rcd=$con->query($cd);
$cdr=0;
if(!empty($rcd)){
	foreach($rcd as $r){
		$cdr=$r['amt'];
	}
}
	
$jq1="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-01-01' AND '2019-03-31') AND c.id = '2' GROUP BY c.name";
$rjq1=$con->query($jq1);
$jqr1=0;
if(!empty($rjq1)){
	foreach($rjq1 as $r){
		$jqr1=$r['amt'];
	}
}
$jq2="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-04-01' AND '2019-06-31') AND c.id = '2' GROUP BY c.name";
$rjq2=$con->query($jq2);
$jqr2=0;
if(!empty($rjq2)){
	foreach($rjq2 as $r){
		$jqr2=$r['amt'];
	}
}

$jq3="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-07-01' AND '2019-09-30') AND c.id = '2' GROUP BY c.name";
$rjq3=$con->query($jq3);
$jqr3=0;
if(!empty($rjq3)){
	foreach($rjq3 as $r){
		$jqr3=$r['amt'];
	}
}

$jq4="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-10-01' AND '2019-12-31') AND c.id = '2' GROUP BY c.name";
$rjq4=$con->query($jq4);
$jqr4=0;
if(!empty($rjq4)){
	foreach($rjq4 as $r){
		$jqr4=$r['amt'];
	}
}


$cq1="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-01-01' AND '2019-03-31') AND c.id = '1' GROUP BY c.name";
$rcq1=$con->query($cq1);
$cqr1=0;
if(!empty($rcq1)){
	foreach($rcq1 as $r){
		$cqr1=$r['amt'];
	}
}

$cq2="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-04-01' AND '2019-06-31') AND c.id = '1' GROUP BY c.name";
$rcq2=$con->query($cq2);
$cqr2=0;
if(!empty($rcq2)){
	foreach($rcq2 as $r){
		$cqr2=$r['amt'];
	}
}

$cq3="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-07-01' AND '2019-09-30') AND c.id = '1' GROUP BY c.name";
$rcq3=$con->query($cq3);
$cqr3=0;
if(!empty($rcq3)){
	foreach($rcq3 as $r){
		$cqr3=$r['amt'];
	}
}

$cq4="SELECT c.id,sum(o.prodAmt) as 'amt',b.date FROM `orders` o JOIN bills b on b.orderId=o.orderId JOIN products p on p.id=o.prodId JOIN subcategory s on s.id=p.category JOIN categories c on c.id=s.category where (b.date BETWEEN '2019-10-01' AND '2019-12-31') AND c.id = '1' GROUP BY c.name";
$rcq4=$con->query($cq4);
$cqr4=0;
if(!empty($rcq4)){
	foreach($rcq4 as $r){
		$cqr4=$r['amt'];
	}
}




if($ss==1){
echo '

<script>

var chart = new CanvasJS.Chart("chartContainers", {
	animationEnabled: true,
	theme: "light2",
	exportEnabled: true,
	title:{
		text: "Quarterly Sales" 
		
	}, 
	axisY:{
		title: "Units Sold"
	},
	toolTip: {
		shared: true
	},
	legend:{
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{        
		type: "spline",  
		name: "Cosmetics",        
		showInLegend: true,
		lineColor: "#83464C",
		legendMarkerColor: "#83464C",
		markerColor: "#83464C",
		dataPoints: [
			{ label: "First Quarter" , y: '.$cqr1.' },     
			{ label: "Second Quarter", y: '.$cqr2.' },     
			{ label: "Third Quarter", y: '.$cqr3.' },     
			{ label: "Fourth Quarter", y: '.$cqr4.' }
		]
	}, 
	{        
		type: "spline",
		name: "Jewelry",
		lineColor: "#262626",
		legendMarkerColor: "#262626",
		markerColor: "#262626",
		showInLegend: true,
		dataPoints: [
			{ label: "First Quarter" , y: '.$jqr1.' },     
			{ label: "Second Quarter", y: '.$jqr2.' },     
			{ label: "Third Quarter", y: '.$jqr3.' },     
			{ label: "Fourth Quarter", y: '.$jqr4.' }
		]
	}]
});

chart.render();

function toggleDataSeries(e) {
	if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;            
	}
	chart.render();
}

</script>
';
}elseif($ss==2){
echo '


<script>
var chart = new CanvasJS.Chart("chartContainers", {
	animationEnabled: true,
	theme: "light2",
	exportEnabled: true,
	title:{
		text: "Monthly Sales" 
		
	}, 
	axisY:{
		title: "Units Sold"
	},
	toolTip: {
		shared: true
	},
	legend:{
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{        
		type: "spline",  
		name: "Jewelry",        
		showInLegend: true,
		lineColor: "#262626",
		legendMarkerColor: "#262626",
		markerColor: "#262626",
		dataPoints: [
			{ label: "January" , y: '.$j1.' },     
			{ label: "February", y: '.$j2.' },     
			{ label: "March", y: '.$j3.' },     
			{ label: "April", y: '.$j4.' },
			{ label: "May" , y: '.$j5.' },     
			{ label: "June", y: '.$j6.' },     
			{ label: "July", y: '.$j7.' },     
			{ label: "August", y: 0 },
			{ label: "September" , y: '.$j9.' },     
			{ label: "October", y: '.$j10.' },     
			{ label: "November", y: '.$j11.' }
		]
	}, 
	{        
		type: "spline",
		name: "Cosmetics",
		lineColor: "#83464C",
		legendMarkerColor: "#83464C",
		markerColor: "#83464C",
		showInLegend: true,
		dataPoints: [
			{ label: "January" , y: '.$c1.' },     
			{ label: "February", y: '.$c2.' },     
			{ label: "March", y: '.$c3.' },     
			{ label: "April", y: '.$c4.' },
			{ label: "May" , y: '.$c5.' },     
			{ label: "June", y: 0 },     
			{ label: "July", y: '.$c7.' },     
			{ label: "August", y: '.$c8.' },
			{ label: "September" , y: '.$c9.' },     
			{ label: "October", y: '.$c10.' },     
			{ label: "November", y: '.$c11.' }
		]
	}]
});

chart.render();

function toggleDataSeries(e) {
	if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;            
	}
	chart.render();
}


</script>
';
}else{
echo '

<script>

var chart = new CanvasJS.Chart("chartContainers", {
	animationEnabled: true,
	theme: "light2",
	exportEnabled: true,
	title:{
		text: "Daily Sales"
	},
	axisY: {
		title: "Units Sold"
	},
	dataPointWidth: 20,
	data: [{        
		type: "column",
		color: "#83464C",
		dataPoints: [      
			{ y: '.$cdr.', label: "Cosmetics" },
			{ y: '.$jdr.',  label: "Jewelry" }
		]
	}]
});
chart.render();

</script>
';}
?>
</body>
</html>