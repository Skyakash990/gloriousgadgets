
<footer>
  <div class="container d-flex">
    <div class="col-md-12 d-flex im">
      <div class="ft-left col-md-3 ">
        <ul>
          <h6 class=" text-secondary ps-1">ABOUT</h6>
          <li><a href="">Home</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Privacy Policiy</a>
          <li><a href="">Contact</a></li>
          <li>
        </ul>
      </div>
      <div class="ft-left col-md-3 ">
        <ul>
          <h6 class=" text-secondary">HELP</h6>
          <li><a href="">Payment</a></li>
          <li><a href="">Shipping</a></li>
          <li><a href="">FAQ</a></li>
        </ul>
      </div>
      <div class="col-md-6">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29558.312375084995!2d71.63890164955255!3d22.17210064289314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958dc7e3fea26e9%3A0x9bdee1c5dbe2e484!2sBotad%2C%20Gujarat%20364710!5e0!3m2!1sen!2sin!4v1680188428833!5m2!1sen!2sin"class=" w-100 pt-4" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <img src="./Assets/payment-method_69e7ec (1).svg" alt="">
    </div>
    </div>
   
  </div>
</footer>



<script src="./bootstrap-5.2.2-dist/js/bootstrap.js"></script>
<script src="Assets/js/jquery-3.6.3.min.js"></script>

<script src="Assets/js/custom.js"></script>
<script src="Assets/js/owl.carousel.min.js"></script>
<!-- Alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>




<script>
  alertify.set('notifier', 'position', 'top-center');
  <?php if (isset($_SESSION['message'])) {

  ?>

    alertify.notify('<?= $_SESSION['message']; ?>', 'custom', 2, function() {
      console.log('dismissed');
    });

  <?php
    unset($_SESSION['message']);
  }
  ?>
</script>
<script>
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  }); 
</script>


</body>

</html>