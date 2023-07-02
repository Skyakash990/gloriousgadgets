<?php 
session_start();
include("./includes/header.php");
include("./functions/userfunctions.php");  
?>


<?php include("./includes/slider.php");  ?> 
<div class="py-5">
  <div class="container">
    <div class="col-md-12">
        <div class="row">
        <h4>Trending Products</h4>
        <hr>
        
<div class="owl-carousel owl-theme" id="trending-carousel">
  <?php
    $trendingProducts = getAllTrending();
    if(mysqli_num_rows($trendingProducts) > 0) {
      foreach($trendingProducts as $item) {
  ?>
        <div class="text item" style="width: 14rem;">
          <a href="product-view.php?product=<?= $item['slug']; ?>">
            <div class="card shadow-sm" style="height: 400px;">
              <div class="card-body d-flex justify-content-center align-items-center">
                <img src="uploads/<?= $item['image']; ?>" alt="img" class="w-100">
              </div>
              <h5 class="ps-4"><?= $item['name']; ?></h5>
              <p class="card-text ps-4">Rs.<?= $item['selling_price']; ?></p>
            </div>
          </a>
        </div>
  <?php
      }
    }
  ?>
</div>

<script>$(document).ready(function() {
  var owl = $("#trending-carousel");
  owl.owlCarousel({
    loop: true,
    items: 5, // Change this value to adjust the number of items displayed in the carousel
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000, // Change this value to adjust the autoplay interval in milliseconds
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      }
    }
  });

  // Function to manually trigger next slide
  function nextSlide() {
    var currentIndex = owl.trigger('to.owl.carousel', [owl.find('.owl-item.active').index() + 1, 300]);
    if (currentIndex >= 4) { // Change this value to adjust the number of products displayed
      owl.trigger('to.owl.carousel', [0, 300]);
    }
  }

  // Call nextSlide function every 3 seconds using setInterval
  var intervalId = setInterval(nextSlide, 3000);

  // Stop autoplay after 10 seconds using setTimeout
  setTimeout(function() {
    clearInterval(intervalId);
  }, 3000); // Change this value to adjust the total autoplay duration in milliseconds
});


</script>



       
      </div>
    </div>
  </div>
</div>

<div class="ft">
  <div class="container">
    <div class="row ">
      <div class="col-md-12 ">
          <h4>About Us</h4>
          <div class="underline ">
           <p class="pt-2 pb-3" style="width:1200px;">  Welcome to <b>Glorious Gadgets</b>, your one-stop shop for all your electronic needs. We specialize in providing top-of-the-line electronic products to customers all around the world.
Our mission is to offer the best quality electronic products at affordable prices, without compromising on customer service. We believe that our customers deserve the very best, and we work hard every day to make that a reality.
At <b>Glorious Gadgets</b>, we are passionate about technology and innovation.  We look forward to serving you and helping you find the perfect product for your needs.</p>
           <p class="pt-2 pb-3" style="width:1200px;"> We are always on the lookout for the latest and greatest products to add to our inventory, so that our customers can stay ahead of the curve. Whether you're looking for a new laptop, smartphone, or any other electronic device, you can trust us to provide you with the best options available.
We take pride in our commitment to customer satisfaction.</p>
           <p class="pt-2 pb-3" style="width:1200px;">Our team of experts is always available to answer any questions you may have about our products, and we go above and beyond to make sure that you are completely satisfied with your purchase. We also offer fast and reliable shipping, so you can receive your order as quickly as possible.
Thank you for choosing  Glorious Gadgets as your go-to destination for electronic products.</p>
          </div>

        
        </div>
      </div>
  </div>
</div>



<div class=" position-relative">
</div>
<script>
    document.title="Glorious Gadgets";
</script>
 
<?php include("./includes/footer.php"); ?>