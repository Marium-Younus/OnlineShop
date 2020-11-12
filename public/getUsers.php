<?php
extract($_REQUEST);
$con=mysqli_connect('localhost','root','','onlineshopdb');
$t3="SELECT u.UserId as 'id',u.PhoneNumber as 'number',u.Address as 'address',u.City as 'city',u.Country as 'country',u.FirstName as 'fn',u.LastName as 'ln',sum(o.prodAmt) as 'amt', s.Email as 'email' FROM `orders` o JOIN userinfo u on u.UserId=o.UserId JOIN users s ON s.Id=u.UserId GROUP BY o.UserId ORDER BY amt DESC LIMIT 10";
$tr3=$con->query($t3);

$t4="SELECT u.UserId as 'id',u.PhoneNumber as 'number',u.Address as 'address',u.City as 'city',u.Country as 'country',u.FirstName as 'fn',u.LastName as 'ln', s.Email as 'email' FROM userinfo u JOIN users s ON s.Id=u.UserId ORDER BY Id";
$tr4=$con->query($t4);

if($uu==1){
	echo '<table class="table table-hover table-borderless" id="users" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Name</th>
                            		<th>Number</th>
                            		<th>Address</th>
                            		<th>Email</th>
                            		<th>Purchases</th>
                            	</tr>';
	foreach($tr3 as $t){
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
	}
	echo '</table>';
}else{
	echo '<table class="table table-hover table-borderless" id="users" style="font-family: Rubik,sans-serif;font-weight: lighter;">
                            	<tr>
                            		<th style="display: none;">ID</th>
                            		<th>Name</th>
                            		<th>Number</th>
                            		<th>Address</th>
                            		<th>Email</th>
                            	</tr>';
	foreach($tr4 as $t){
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
								</tr>';
	}
	echo '</table>';
}

echo '
<script>
var table2 = document.getElementById(\'users\'); //Get values from Users table into form
                
for(var i = 1; i < table2.rows.length; i++)
	{
		table2.rows[i].onclick = function()
		{
			$(\'#userDetails\').fadeIn(300);
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
</script>
';
?>