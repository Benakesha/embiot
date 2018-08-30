<?php
    
	include "hotels_db.php";
	$UserNames=$_SESSION['UserName'];
	$mobilenumbers=$_SESSION['MobileNo'];
?>
<div class="container" style="background-color: #FFFFF0;">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6" >
				<h5 style="float: left;">Welcome : <b><?php echo $_SESSION['UserName']; ?></b></h5>
			</div>
			<div class="col-md-6" >
				<h5 style="float: right;">Mobile No: <b><?php echo $_SESSION['MobileNo']; ?></b></h5>
			</div>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row" style="background-color: #F5FFFA;">
		<div class="col-md-12">
			<h3 style="margin-left: 30%;"><b><u>Place Order</u></b></h3>
			<br>
			<form method="post" style="margin-left:10%;padding-bottom: 100px;" >
				<div class="col-md-3">
				
				<div class="form-group">
					<label>Select Item:</label>
					<select class="form-control" name="items" id="items">
						<option value="select">Select</option>
						<?php
							$sql="SELECT * FROM item_details";
							$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
							while($row=mysqli_fetch_assoc($res)){
								$itemname=$row['ItemName'];
								echo '<option value="'.$itemname.'">'.$itemname.'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<label>Qty :</label>
				<div class="form-group">
					<input type="text" name="qty" id="qty" placeholder="Enter Quantity" class="form-control">
				</div>	
			</div>
			<div class="col-md-2">
				<div class="form-group" style="margin-top: 18%;">
					<button type="submit" name="orders" id="btnOrder" class="form-control btn btn-primary">Add Item</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$('#btnOrder').on('click',function(e){
			//e.preventDefault();
			var itemname=$('#items option:selected').text();
			var qty=$('#qty').val();
			$.ajax({
				type:"POST",
				url:"addItem.php",
				data:{'itemname':itemname,'qty':qty},
				success:function(data){
					console.log(data);
				}
			});

		});

	});
</script>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<div class="container"><br>
	<div class="row" style="background-color: #F8F8FF;">
		<div class="col-md-12 table-responsive">
			<h3>Todays order details: <small><?php echo Date('Y/m/d H:m:s A');?></small></h3>
			<table class="table">
			    <thead>
			      <tr>
			        <th>Order DateTime</th>
			        <th>Item Name</th>
			        <th>Qty</th>
			        <th>Price</th>
			        <th>Breakfast</th>
			        <th>Lunch</th>
			        <th>Snacks</th>
			        <th>Dinner</th>
			      </tr>
			    </thead>
			  <tbody>

			<?php

				date_default_timezone_set('Asia/Kolkata');
				$current_date=date('Y/m/d H:m:s A');

				if(isset($_POST['orders'])){
					$sql1="SELECT u.*,o.* FROM daily_users u,order_details o WHERE u.MobileNo = o.MobileNum AND u.MobileNo='$mobilenumbers'";
					$res=mysqli_query($conn,$sql1) or die(mysqli_error($conn));

					while($row=mysqli_fetch_assoc($res)){

						$OrderDate=$row['OrderDate'];
						$ItemName=$row['ItemName'];
						$Qty=$row['Quantity'];
						$Price=$row['Price'];
						$Breakfast=$row['BreakFast'];
						$Lunch=$row['Lunch'];
						$Snacks=$row['Snacks'];
						$Dinner=$row['Dinner'];

					?>
						<tr>
					        <td><?php echo $OrderDate; ?></td>
					        <td><?php echo $ItemName; ?></td>
					        <td><?php echo $Qty; ?></td>
					        <td><?php echo $Price; ?></td>
					        <td><?php echo $Breakfast; ?></td>
					        <td><?php echo $Lunch; ?></td>
					        <td><?php echo $Snacks; ?></td>
					        <td><?php echo $Dinner; ?></td>
				        </tr>

					<?php						
					}

				}

			?>

			        
			    </tbody>
			  </table>
		</div>
	</div>
</div>
