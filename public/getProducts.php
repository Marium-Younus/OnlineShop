<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$t2="SELECT i.path as 'path',i.name as 'image',p.id as 'ID',p.name as 'Product',SUM(prodAmt) as 'Sold', c.name as 'Category', p.price as 'price',p.detail as 'detail',p.tags as 'tags' FROM orders o JOIN products p on p.id=o.prodId JOIN imglink l ON l.ProdId = p.id JOIN images i ON i.id=l.imgId JOIN subcategory c on c.id=p.category GROUP BY o.prodId ORDER BY Sold DESC LIMIT 10";
$tr2=$con->query($t2);

$t3="SELECT i.path as 'path', i.name as 'image',p.`id` as 'id',p.`name` as 'product',p.`category` as 'catid',s.name as 'subcategory',c.name as 'category',p.`price` as 'price',p.`detail` as 'detail',p.`tags` as 'tags' FROM `products` p JOIN subcategory s on p.category = s.id JOIN imglink l ON l.ProdId=p.id JOIN images i ON i.id=l.imgId JOIN categories c on c.id=s.category ORDER BY id ASC";
$tr3=$con->query($t3);

if($pp==2){

echo '
<table class="table table-hover table-borderless" id="products" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display:none;">ID</th>
									<th>Product</th>
									<th>Subcategory</th>
									<th>Price ($)</th>
                            		<th>Category</th>
                            	</tr>';
foreach($tr3 as $t){
	echo '
                            	
								<tr>
									<td style="display:none;">'.$t['id'].'</td>
									<td>'.$t['product'].'</td>
									<td>'.$t['subcategory'].'</td>
									<td>'.$t['price'].'</td>
									<td>'.$t['category'].'</td>
									<td style="display:none;">'.$t['path'].'</td>
									<td style="display:none;">'.$t['image'].'</td>
									<td style="display:none;">'.$t['detail'].'</td>
									<td style="display:none;">'.$t['tags'].'</td
								</tr>
                            ';
}
	echo '</table>';
}
else{
	
echo '

<table class="table table-hover table-borderless" id="products" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display:none;">ID</th>
									<th>Product</th>
                            		<th>Category</th>
                            		<th>Price ($)</th>
                            		<th>Sold</th>
                            	</tr>';
foreach($tr2 as $t){
	echo '
                            	
								<tr>
									<td style="display:none;">'.$t['ID'].'</td>
									<td>'.$t['Product'].'</td>
									<td>'.$t['Category'].'</td>
									<td>'.$t['price'].'</td>
									<td>'.$t['Sold'].'</td>
									<td style="display:none;">'.$t['path'].'</td>
									<td style="display:none;">'.$t['image'].'</td>
									<td style="display:none;">'.$t['detail'].'</td>
									<td style="display:none;">'.$t['tags'].'</td>
								</tr>
                            ';
}
echo '</table>';
}
echo '
<script>
var table = document.getElementById(\'products\');
                
for(var i = 1; i < table.rows.length; i++)
	{
		table.rows[i].onclick = function()
		{
			$(\'#topProdDetails\').fadeIn(300);
			document.getElementById("prodId").value = this.cells[0].innerHTML;
			var path = this.cells[5].innerHTML;
			var img = this.cells[6].innerHTML;;
			$(\'#imgPreview\').html(\'<img style="height: 200px; width: 200px;" src="\'+path+img+\'"/>\');
			$(\'#imgNm\').html(img);
			document.getElementById("prodNm").value = this.cells[1].innerHTML;
			document.getElementById("prc").value = this.cells[3].innerHTML;
			document.getElementById("cat").value = this.cells[2].innerHTML;
			document.getElementById("det").value = this.cells[7].innerHTML;
			document.getElementById("tag").value = this.cells[8].innerHTML;
		};
	}
</script>
';
?>