<script src="../Assets/js/script.js"></script>
<script src="../bootstrap-5.2.2-dist/js/bootstrap.js"></script>
<script src="Assets/js/jquery-3.6.3.min.js"></script>
<!-- Alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="Assets/js/custom.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
  <?php if (isset($_SESSION['message'])) {

  ?>

    alertify.set('notifier', 'position', 'top-right');
    alertify.notify('<?= $_SESSION['message']; ?>', 'custom', 2, function() {
      console.log('dismissed');
    });

  <?php
    unset($_SESSION['message']);
  }
  ?>
</script>
<script>
   CKEDITOR.replace( 'editor1' );
  </script>
  

</body>

</html>