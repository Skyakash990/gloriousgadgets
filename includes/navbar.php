  <!------Navbar start------>

  <div class="nav" style="margin-bottom: 55px;" ;>
    <div id="navbar" >
      <nav class="navbar fixed-top me-auto navbar-expand-lg ">
        <div class="container-fluid ">
          <a style="color:#fff;" class="navbar-brand ps-5" href="index.php">Glorious Gadgets</a>
          <div class="srch ps-5">
            <input type="search" name="" placeholder="Search for products" id="">
            <span>
              <button class="fa-solid fa-magnifying-glass"></button>
            </span>
          </div>


          <img src="./Assets/" alt="">
          <button onclick=toogle class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse sky navbar-collapse justify-content-between d-flex d-none " id="navbarTogglerDemo02" style="padding-right: 50px;">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0 ">
              <li class="nav-item"><a class="nav-link" href="Index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
              <li class="nav-item"><a class="nav-link" href="categories.php">Collection</a></li>
              <?php
                if (isset($_SESSION['auth'])) {
                ?>
                <li class="nav-item"><a class="nav-link" href="privacy-policy.php">Privacy Policy</a></li>
                <li class="nav-item"><a class="nav-link" href=""> <?= $_SESSION['auth_user']['name']; ?><i class="fa-solid fa-caret-down ps-1"></i></a>
                  <div class="sub-menu1">
                    <ul>
                      <li><a href="./my-orders.php">Myorder</a></li>

                      <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == "admin"){ ?>
  <li><a href="./admin/index.php">Admin</a></li>
<?php } ?>

                      
                      <li><a href="./login/logout.php">Logout</a></li>
                    </ul>
                  </div>
                </li>
                <?php
                } else {
                ?>

                <!-- <div class="lg navbar-nav sky me-auto"> -->
                  <!-- <ul> -->
                  <li class="nav-item"><a class=" btn" href="./login/Signin.php">Login<i class="fa-solid fa-caret-down ps-1"></i></a>
                  <div class="sub-menu1">
                    <ul>
                      <li><a href="./login/Signup.php">Sign Up</a></li>
                      <!-- <li><a href="">drop1</a></li> -->
                    </ul>
                  </div>
                  </li>
                  <!-- <li class="nav-item"><a class=" btn" href="">Sign up</a></li> -->
                  <!-- </ul> -->

                <!-- </div> -->
              <?php
              }
              ?>



            </ul>





          </div>

        </div>
      </nav>
    </div>
  </div>
  <!----------Nav End-------->
  <script>
    let collapse = document.querySelector(".collapse");
    const toogle = () =>{
      
    }
  </script>