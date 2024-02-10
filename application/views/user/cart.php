<div class="contanier">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-sm">
				<tr style="text-align:center;">
					<th>SN</th>
					<th>Image</th>
					<th>Name</th>
					<th>Qty</th>
					<th>Rate</th>
					<th>Total</th>

				</tr>
				<?php
					foreach ($cart_list as $key => $row) {
						?>
						
				<tr>
					<td style="text-align:center;"><?=$key+1?></td>
					<td style="text-align:center;">
						<img src="<?=base_url()?>uploads/<?=$row['product_image']?>" width="50px" >
						</td>
					<td ><?=$row['product_name']?></td>
					<td width="1%" style="white-space: nowrap;">

						<button style="width:25px; border:1px solid grey; border-radius:100%; background-color:white; margin-top:10px;" onclick="dec_qty('<?=$row['user_cart_id']?>')">- </button>

							<input type="text" id="my_inp_id<?=$row['user_cart_id']?>" class="btn btn-sm" style="width:60px;text-align:center;" value="<?=$row['qty']?>">

						<button style="width:25px; border:1px solid grey; border-radius: 100%; background-color:white;" onclick="inc_qty('<?=$row['user_cart_id']?>')">+</button>

					</td>
					<td style="text-align:center;">
						<input type="hidden" id="rate_id<?=$row['user_cart_id']?>" value="<?=$row['product_price']?>">

						<?=$row['product_price']?>
						</td>
						
					<td id="row_ttl<?=$row['user_cart_id']?>" class="prod_ttl"  style="text-align:center;"><?=$row['qty']*$row['product_price']?></td>
				</tr>
				<?php
					}
				?>
			</table>
			<div style="text-align:center;margin-bottom:20px;">
			<a href="<?=base_url()?>in/confirm_order">
				<button class="btn btn-warning text-white">Confirm Order</button>
			</a>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function dec_qty(user_cart_id)
	{
		$.ajax({
  				url:'<?=base_url()?>in/dec_qty',
  				type:'POST',
  				dataType:'json',
  				data:{'user_cart_id' : user_cart_id},
  				
  			})
		.done(function(res)
		{
  				// console.log("success",res['data']['qty']);
  			
		$("#my_inp_id"+user_cart_id).val(res['data']['qty']);

		var rate=$("#rate_id"+user_cart_id).val();

		var ttl=rate*res['data']['qty'];
		$("#row_ttl"+user_cart_id).html(ttl);
		})
	}

	function inc_qty(user_cart_id)
	{
		// alert(user_cart_id);
		$.ajax({
  				url:'<?=base_url()?>in/inc_qty',
  				type:'POST',
  				dataType:'json',
  				data:{'user_cart_id' : user_cart_id},
  				
  			})
		.done(function(res)
		{
  				// console.log("success",res['data']['qty']);
  			
		$("#my_inp_id"+user_cart_id).val(res['data']['qty']);
		// $("#rate_id").val();

		var rate=$("#rate_id"+user_cart_id).val();

		var ttl=rate*res['data']['qty'];

		$("#row_ttl"+user_cart_id).html(ttl);

		})
	}
</script>
