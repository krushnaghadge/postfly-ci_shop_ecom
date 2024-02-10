<div class="container-fluid p-3 bg-white">
    <div class="row">
         <div class="col-md-12">
         <div class="container">
    <div class="row">
       
        

       
        <div class="col-md-8">
        <div class="card">
  <div class="card-header">
    order Detail
  </div>
  <div class="card-body">
            <table class="table">
                <tbody>
                    <?php foreach ($order_det as $order): ?>
                        <tr>
                            <th>Order ID</th>
                            <td><?php echo $order['order_tbl_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?php echo $order['country']; ?></td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td><?php echo $order['state']; ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $order['city']; ?></td>
                        </tr>
                        <tr>
                            <th>Pincode</th>
                            <td><?php echo $order['pincode']; ?></td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $order['mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td><?php echo $order['customer_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td><?php echo $order['order_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Amount</th>
                            <td><?php echo $order['order_amt']; ?></td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td><?php echo $order['order_status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>  </div>  </div>

        <div class="col-md-4">
    <div class="card border-dark">
        <div class="card-header">
            Product Detail
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <?php foreach ($order_product_det as $product): ?>
                        <tr>
                            <th>ID</th>
                            <td><?php echo $product['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td><?php echo $product['product_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td><?php echo $product['product_price']; ?></td>
                        </tr>
                        <tr>
                            <th>Product Company</th>
                            <td><?php echo $product['product_company']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



    </div>
</div>

          </div>
          <div class="col-md-12">
            <br>
            <?php
            if($order_det['0']['order_status']=="pending")
            {
            ?>
             <a href="<?=base_url()?>admin/send_to_reject/<?=$order_det['0']['order_tbl_id']?>">
                <button class ="btn btn-danger"> Reject Order</button>
               </a>

               <a href="<?=base_url()?>admin/send_to_dispach/<?=$order_det['0']['order_tbl_id']?>">
                <button class ="btn btn-dark"> Conform & Dispach Order</button>
               </a>

               <?php
                }
                 if($order_det['0']['order_status']=="dispach")
                 {
                 ?>
     
                    <a href="<?=base_url()?>admin/send_to_delivered/<?=$order_det['0']['order_tbl_id']?>">
                     <button class ="btn btn-success"> Conform & Delivered Order</button>
                    </a>
     
                    <?php
                     }
                      ?>
                
          </div>      
    </div>   

</div>