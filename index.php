<?php 
require_once('admin/connect.php');
include('inc/header.php');
include('inc/navbar.php');
?>

      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/hero-banner-alt.jpg)">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="shop.php">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">

          <?php 
            require_once ('admin/connect.php');
            $product = "SELECT * FROM product ";
            $query = $conn -> query($product);
            foreach ($query as $products):

        // select images   
        $productID = $products['id'];
        
        $Image = "SELECT * FROM Images WHERE product_id =  $productID";
        $queryImage = $conn -> query($Image);
        $Img = $queryImage -> fetch_assoc();
        $All = explode("," , $Img['img_name'] );
            ?>

            <div class="col-md-4 mb-4 mb-md-0">
              <a class="category-item" href="shop.php?page=1">
                <img class="img-fluid" src="admin/images/<?= $All[0]?>" alt="">
                <strong class="category-item-title">
                <!-- select  category -->
                <?php 
                $catId = $products['cat_id'];
                $Category = "SELECT * FROM category WHERE id = $catId";
                $QueryCat = $conn -> query($Category);
                $reqult = $QueryCat -> fetch_assoc();
                echo $reqult['name'];
                ?>
                </strong>
              </a>                       
              </div>
              <?php 
              endforeach;
              ?>
          </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        
            
          </div>
        </section>
        <!-- SERVICES-->
     
       
        </section>
      </div>
   
      <?php 
include 'inc/footer.php';
      ?>