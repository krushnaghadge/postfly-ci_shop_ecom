
<form action="<?=base_url()?>admin/save_slider_img_home" method="post" enctype="multipart/form-data">
<div class="container-fluid p-3 bg-white">
    <div class="row">
        <div class="col-md-12"> 
            <h3> Slider Image </h3>
        </div>
       
        
		
		<div class="col-md-4 mb-3">
			<b>Product Image</b>
			<input type="file" name="image_url" class="form-control p-2" required>
		</div>
	
        <div class="col-md-12 mb-3">
		    <button class="btn btn-primary btn-md">SAVE slider_img_home</button>
             
        </div>
    </div>

</div>
</form>



<div class="container-fluid p-3 bg-white">
	<table class="table table-bordered">
	<tr>
		<th></th>
		<th></th>
		<th>SN</th>
		<th>image_url</th>
	</tr>

	<?php
	foreach ($category_list as $key=> $row)
	 {
		?>
		<tr>
		<td width="1%">
				<a href="<?=base_url()?>admin/remove_category/<?=$row['category_id']?>" onclick="return confirm('Are You Sure...?')">
				<button class="btn btn-info btn-sm p-1">
					<i class="fa fa-trash"></i>
				</button>
			</a>
		</td>
		<td width="1%">
				<a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>">
				<button class="btn btn-danger btn-sm p-1">
				edit
				</button>
			</a>
			</td>
		<td><?=$key+1?></td>
		<td><?=$row['image_url']?></td>
		</tr>
	<?php
	}

	?>
</table>
</div>
    
