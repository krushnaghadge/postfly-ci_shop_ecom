
<form action="<?=base_url()?>admin/save_category" method="post">
<div class="container-fluid p-3 bg-white">
    <div class="row">
        <div class="col-md-12"> 
            <h4> Add New Category</h4>
        </div>
        <div class="col-md-9 mt-3">
             <label> Enter  New Category</label>
              <input type="text" name="category_name" class="form-control" placeholder="Enter  New Category">

        </div>
        <div class="col-md-3 mt-3 text-center">
		<br> 
             <button class="btn btn-primary btn-sm"> Save Category</button>
             
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
		<th>CATEGORY NAME</th>
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
		<td><?=$row['category_name']?></td>
		</tr>
	<?php
	}

	?>
</table>
</div>