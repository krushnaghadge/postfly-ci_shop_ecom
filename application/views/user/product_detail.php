<br>
<br>

<div class="container">
	<div class="row">
		<div class="col-md-5" style="box-shadow: 1px 2px 2px 2px rgba(0, 0, 0, 0.2);">
			<img src="<?=base_url()?>uploads/<?=$product_det[0]['product_image']?>" width="70%">
		</div>
		<div class="col-md-7">
			<h4><?=$product_det[0]['product_name']?></h4>
			<h6>
				&#8377;<?=$product_det[0]['product_price']?> 
				<strike style="color: grey; margin-right: 10px">&#8377;<?=$product_det[0]['duplicate_price']?> </strike> -

				<a style="color:green;font-size: 13px;"><?=dis($product_det[0]['product_price'],$product_det[0]['duplicate_price'])?>%  OFF</a>
			</h6>
			<h4><del>&#8377;<?=$product_det[0]['duplicate_price']?></del> <?=$product_det[0]['product_price']?></h4>
			
			<h6><?=$product_det[0]['product_color']?></h6>
			<br>

			<?php
			if (!isset($cart[0]))
			 {
				?>

			<a href="<?=base_url()?>in/add_to_cart/<?=$product_det[0]['product_id']?>">
			<button class="btn btn-warning" style="color:black;font-weight:bold;"><i class="fa-solid fa-cart-shopping"></i> Add To Cart</button></a>
			<?php
		}
		else
		{
			?>
			<u style="color:grey;">Added to Cart</u>
			
			
			<?php
		}
		?>


		</div>
	</div>
</div>
<br><br>