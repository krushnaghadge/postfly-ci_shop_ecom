  

  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    	<?php
    	foreach($prod_list as $row)
    	{
    		?>
    
       	<div class="col mb-5">
           	<div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="<?=base_url()?>uploads/<?=$row['product_image']?>" alt="..." />
                     <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                                    <!-- Product name-->
                            <h5 class="fw-bolder"><?=$row['product_name']?></h5>
                                    <!-- Product price-->
                                    <strike>&#8377;<?=$row['duplicate_price']?> </strike>
                                   &#8377;<?=$row['product_price']?> 


                        </div>
            		</div>
            		<!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?=base_url()?>in/product_detail/<?=$row['product_id']?>">View Product</a></div>
                            </div>
        	</div>
        </div>
        <?php
        }
        ?>
    </div>
 </div>

