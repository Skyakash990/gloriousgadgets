<?php session_start();
include("./functions/userfunctions.php");
include("./includes/header.php");
include("authenticate.php");
?>


<div class="py-5">
    <div class="container">
        <div class="col-md-12" id="remove">
        <?php $items = getCartItems();
            if(mysqli_num_rows($items)>0)
            {
                    ?>
            
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h5>Products</h5>
                        </div>
                        <div class="col-md-3">
                            <h5>Price</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Quantity</h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Action</h5>
                        </div>
                    </div>

                    <?php          
                    foreach ($items as $citem) 
                    {
                        ?>
                            <div class="card product_data shadow-sm mb-3" >

                                <div class="row align-items-center">
                                    <div class="col-md-2 py-4" style="padding-left:50px">
                                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?= $citem['name'] ?></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Rs<?= $citem['selling_price'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                        <div class="input-group mb-3 " style="width: 130px;padding-top:23px;">
                                            <button class="input-group-text minus updateQty">-</button>
                                            <!-- <span class="form-control ps-2 input-qty bg-white">01</span> -->
                                            <input type="text" class="form-control  text-center qty bg-white" value="<?= $citem['prod_qty']; ?>" disabled>
                                            <button class="input-group-text plus updateQty">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- <a href="cart.php"> -->
                                            <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                        <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                    }

                    ?>
                <div class="float-end">
                    <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
                </div>
                <?php
            }
            else{
                ?>
                <div class=" text-center shadow">
                    <h4 class="py-3">Your Cart Is Empty</h4>
                </div>
                <?php
            }
                ?>
        </div>
    </div>

</div>
</div>
</div>

<script>
    document.title="Cart";
</script>


<?php include("./includes/footer.php"); ?>