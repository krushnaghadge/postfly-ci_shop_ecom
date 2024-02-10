<form action="<?=base_url()?>in/place_order" method="post">


<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Order Address</h5>
       
		
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Order Products</h5>
        

      </div>
    </div>
  </div>
</div>
<div class="container  mt-4">
	<div class="row">
		<div class="col-md-6">
			<h4>Order Address,</h4>
			<div class="row">
			<div class="col-md-5 mb-2">
				Enter Country
				<input type="text" name="country" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter State
				<input type="text" name="state" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Dist
				<input type="text" name="dist" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter City
				<input type="text" name="city" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Village
				<input type="text" name="village" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Area
				<input type="text" name="area" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Landmark
				<input type="text" name="landmark" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Appartment/House No.
				<input type="text" name="appartment_house" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Pincode
				<input type="text" name="pincode" class="form-control">
			</div>
			<div class="col-md-5 mb-2">
				Enter Mobile No
				<input type="text" name="mobile" class="form-control">
			</div>
		</div>
		</div>



		<div class="col-md-6">
			
			<h4>Order Products,</h4>
			<br>
			<table class="table table-sm">
			<?php
			$ttl=0;
			foreach ($cart_list as $key => $row) {
				?>
				<tr>
					<td><?=$key+1?></td>
					<td class="text-end"><?=$row['product_name']?></td>
					<td><?=$row['qty']?> qty</td>
					<td class="text-end">&#8377; <?=$row['product_price']?> /-</td>
					<td class="text-end">&#8377; <?=$row['qty']*$row['product_price']?> /-</td>



				</tr>
				<?php
				$ttl=$ttl+($row['qty']*$row['product_price']);
			}
			?>
			<tr>
				<th class="text-end" colspan="5">
					<big style="float: left;">Total :</big>
					<big>&#8377; <?=$ttl?> /-</big></th>
			</tr>
		</table>
		<br>


		<h4>Payment Option,</h4>
	
		<input type="radio" name="payment_method" value="COD"> Cash On Delivery
		<br>
	
		<input type="radio" name="payment_method" value="Online"> Online Payment
		<br>
		</div>
		<div class="col-md-12 text-right">
			<br>
			<button class="btn btn-info">Place Order</button>
			<br><br>
		</div>
	</div>
</div>
</form>