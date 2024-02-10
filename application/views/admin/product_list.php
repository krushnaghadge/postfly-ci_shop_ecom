<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<h3>Product List</h3>
		</div>
		<div class="col-md-12">
			<table class="table table-sm table-bordered">
				<tr>
					<th>Action</th>
					<th>Action</th>
					<th>SN</th>
					<th>CATEGORY</th>
					<th>NAME</th>
					<th>PRICE</th>
					<th>COMPANY</th>
					<th>IMAGE</th>
		</tr>
		<?php
			foreach ($products as $key => $row) 
			{
				?>
				<tr>
				<td width="1%">
				<a href="<?=base_url()?>admin/remove_product/<?=$row['product_id']?>" onclick="return confirm('Are You Sure...?')">
				<button class="btn btn-info btn-sm p-1">
					<i class="fa fa-trash"></i>
				</button>
			</a>
		</td>
		<td width="1%">
				<a href="<?=base_url()?>admin/edit_product/<?=$row['product_id']?>">
				<button class="btn btn-danger btn-sm p-1">
				<i class="fa fa-edit"></i>
				</button>
			</a>
			</td>
					<td><?=$key+1?></td>
					<td><?=$row['category_name']?></td>
					<td><?=$row['product_name']?></td>
					<td><?=$row['product_price']?></td>
					<td><?=$row['product_company']?></td>
					<td>
                        <img src="<?=base_url()?>uploads/<?=$row['product_image']?>" style="border-radius: 0px; width=8 0px">
						<a href="<?=base_url()?>uploads/<?=$row['product_image']?>">
						<button class="btn btn-primary p-1">Open</button>
						

				
				</tr>
				<?php
			}
		?>
			</table>
		</div>
	</div>
</div>
