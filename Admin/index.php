<?php ?>
<?php include("./includes/header.php")?>
<?php include("./includes/sidebar.php");
include('../config/dbcon.php'); ?>

<?php include('../middleware/adminMiddleware.php')?>


<section class="home-section">
<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">
            <?php
      // Assuming you have already established a database connection
      
      // Execute the query to fetch data from the 'orders' table
      $query = "SELECT COUNT(*) as total_orders FROM orders"; // Use COUNT(*) to get the total number of rows
      $result = mysqli_query($con, $query);
      
      // Check if the query executed successfully
      if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        // Retrieve the 'total_orders' value from the result
        $totalOrders = $row['total_orders'];
        
        // Display the total number of orders
         $totalOrders;
         echo"$totalOrders";
      } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($con);
      }
      ?>
            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">
            <?php
      // Assuming you have already established a database connection
      
      // Execute the query to fetch data from the 'orders' table
      $query = "SELECT SUM(total_price) as total_profit FROM orders";
      $result = mysqli_query($con, $query);
      
      // Check if the query executed successfully
      if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        // Retrieve the 'total_profit' value from the result
        $totalProfit = $row['total_profit'];
        
        // Display the total profit
        echo $totalProfit;
      } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($con);
      }
      ?>
            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>
    
</section>

<?php include("./includes/footer.php")?>
<script>
    document.title="Admin";
</script>