<?php session_start();
include("./includes/header.php");
include("./functions/userfunctions.php");
?>


<div class="container">
  <div class="py-5 ">
    <div class="col-md-12 ps-5 pe-5 " style="padding-top: 33px;">
      <h1>Our Categories</h1>
      
      <br>
      <div class="row text-decoration-none d-flex justify-content-center align-items-center h-100">
        <?php
        $categories = getAllActive('categories');

        if (mysqli_num_rows($categories) > 0) {
          foreach ($categories as $item) {
        ?>



            <div class="col-md-3 text pb-5 h-100">
              <a href="products.php?category=<?= $item['slug']; ?>">

              <div class="card" style="width: 16rem; height:400px;">
                  <div class=" card-body  d-flex justify-content-center align-items-center ">
                    <img src="uploads/<?= $item['image']; ?>" alt="img" class="w-100 align-items-center">
                  </div>
                  <h5 class=" text-center mt-3"><?= $item['name']; ?></h5>
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

<script>
    document.title="Categories";
</script>





<?php include("./includes/footer.php"); ?>