<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<h4>Dispach Orders</h4>
		</div>
		<div class="col-md-12 table-responsive">
			<table class="table table-sm table-bordered">
				<tr>
					<th></th>
					<th>SrNo.</th>
					<th>Customer Name</th>
					<th>Customer Mobile</th>
					<th>Order Date</th>
					<th>Amount</th>
					<th>Payment</th>
					<th>Address</th>
				</tr>
				<?php
				foreach ($orders as $key => $row) 
				{
					//var_dump($row);
					?>
				
				<tr>
				  
				<td>
					<a href="<?=base_url()?>admin/order_details/<?=$row['order_tbl_id']?>">
						<button class="btn btn-primary btn-sm p-1"> 
						<i class="fa fa-info"></i> 
					    Info</button>
				        </a>
					</td>
					<td><?=$key+1?></td>
					<td><?=$row['customer_name']?></td>
					<td><?=$row['mobile']?></td>
					<td><?=date('d-m-Y',strtotime($row['order_date']))?></td>
					<td>&#8377; <?=number_format1($row['order_amt'])?></td>
					<td><?=$row['payment_method']?></td>
					<td><?=$row['country']?> - <?=$row['state']?> - <?=$row['dist']?> - <?=$row['city']?> - <?=$row['village']?> - <?=$row['area']?> - <?=$row['landmark']?> - <?=$row['appartment_house']?> - <?=$row['pincode']?></td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
		</div>
	</div>
