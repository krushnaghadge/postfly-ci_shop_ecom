<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="row">
        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 1</h5>
              <p class="card-text">Content for slide 1.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 2</h5>
              <p class="card-text">Content for slide 2.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 3</h5>
              <p class="card-text">Content for slide 3.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 4</h5>
              <p class="card-text">Content for slide 4.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 5</h5>
              <p class="card-text">Content for slide 5.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Slide 6</h5>
              <p class="card-text">Content for slide 6.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>


<!-- Header-->

<header class="bg-white py-5">
    

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">


<?php
    foreach($slider_image as $key => $row)
    {
        ?>
    
<div class="carousel-item <?=($key == 0) ? 'active':''?>">
    
  <img src="<?=base_url()?>uploads/<?=$row['image_url']?>" class="d-block w-100 h-100" alt="...">
</div>
<?php 
}
?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</header>








<!-- Section-->
<section class="py-5">
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
        foreach ($new_products as  $row) {
            ?>

        <div class="col mb-5">
            <div class="card h-100">
                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?=dis($row['product_price'],$row['duplicate_price'])?>%</div>
                <!-- Product image-->
                <img class="card-img-top" src="<?=base_url()?>uploads/<?=$row['product_image']?>" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder"><?=$row['product_name']?></h5>
                        <!-- Product price-->
                        <strike>&#8377;<?=$row['duplicate_price']?></strike>
                         &#8377;<?=$row['product_price']?> 

                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?=base_url()?>in/product_detail/<?=$row['product_id']?>">View Details</a></div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</div>
</section>