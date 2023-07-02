<?php session_start();
include("./includes/header.php");
include("./functions/userfunctions.php");

if (isset($_GET['category'])) {


  $category_slug = $_GET['category'];
  $category_data = getSlugActive("categories", $category_slug);
  $category = mysqli_fetch_array($category_data);
  if ($category) {


    $cid = $category['id'];
?>


<div class="container">
  <div class="py-3">
    <!-- <div class="col-md-12 ps-5 pe-5" style="padding-top: 33px;"> -->
      <!-- <a href="categories.php" class="btn btn-danger float-end"> <i class="fa fa-reply"></i> Back</a> -->
      <h1><?= $category['name']; ?></h1>
      
      <div class="row d-flex justify-content-center ">
        <?php

$product = getProductbycat($cid);

if (mysqli_num_rows($product) > 0) {
  foreach ($product as $item) {
    ?>

                <div class="col-md-4 pb-3 text" style="width: 16rem;">
                  <a href="product-view.php?product=<?= $item['slug']; ?>">
                    <div class="card shadow-sm h-100" >
                      <div class="card-body text-center w-100" >
                        <img src="uploads/<?= $item['image']; ?>" alt="img" height="218px" class="w-100">
                      </div>
                      <h5 class="ps-4"><?= $item['name']; ?></h5>
                      <p class="card-text ps-4">Rs.<?= $item['selling_price']; ?></p>
                    </div>
                  </a>
                </div>
           

           



            <?php
              }
            } else {
              echo "No data available";
            }

            ?>
          </div>



        </div>
      </div>
    </div>


<?php
  } else {
    echo "Something Went Wrong";
  }
} else {
  echo "Something went Wrong";
}
?>



<?php include("./includes/footer.php"); ?>