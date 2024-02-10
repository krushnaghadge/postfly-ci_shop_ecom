<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Postfly- Design the art</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=base_url()?>user_assets/css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/5daa8eb347.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?=base_url()?>"> Postfly.in</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?=base_url()?>">Home</a></li>

                        
                        <?php
                        foreach ($cat_list as  $row) 
                        {
                            ?>
                        <li class="nav-item"><a class="nav-link" href="<?=base_url()?>in/view_products?cat_id=<?=$row['category_id']?>"><?=$row['category_name']?></a></li>
                        <?php
                         }
                        ?>
                  
                    </ul>
                    <?php
                    if (!isset($_SESSION['user_tbl_id']))
                     {
                        
                    ?>
                    <a href="<?=base_url()?>/in/login" style="text-decoration:none;color:black;"><button class="btn btn-dark btn-sm" style="border:none;">Login/SignUp</button></a>

                    <?php
                }
                    if (isset($_SESSION['user_tbl_id']))
                    {
                ?>
                    <form class="d-flex" action="<?=base_url()?>/in/cart">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?=$cart_qty?></span>
                        </button> 
                    </form>
                   <a href="<?=base_url()?>/in/logout" style="text-decoration:none;color:black;margin-left:30px;"><button class="btn btn-dark btn-sm" style="border:none;" onclick="return confirm('Are YOU Sure...')">LogOut</button></a>
                    <?php
                }
                ?>
                </div>
            </div>
        </nav>

 


