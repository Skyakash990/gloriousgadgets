<?php
session_start();
include("./includes/header.php");
include("./functions/userfunctions.php");

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>

<div class="bg-light">
    <div style="padding-left: 100px;" class="container  product_data im py-5">
        <div class="row d-flex">
            <div class="col-md-3">
                <div class=" w-100 ps-5 p-3  align-items-center">
                    <img src="uploads/<?= $product['image']; ?>" alt="product img" class="w-100 h-100">


                </div>
            </div>
            <div class="col-md-8">
                <h4 class=" fw-bold"><?= $product['name']; ?>
                    <span class=" float-end text-danger">
                        <h4><?php if ($product['trending']) {
                                        echo "Trending";
                                    } ?></h4>
                    </span>
                </h4>
                <hr>
                <p><?= $product['small_description']; ?></p>
                <div class="row">
                    <div class="col-md-3">
                        <h4 class=" fw-semibold"><i
                                class="fa-solid fa-indian-rupee-sign"></i><?= $product['selling_price']; ?></h4>
                    </div>
                    <div class="col-md-3">
                        <h5 style="color: #878787;" class=""><s><i
                                    class="fa-solid fa-indian-rupee-sign"></i><?= $product['original_price']; ?></s>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3 " style="width: 130px;">
                            <button class="input-group-text minus">-</button>
                            <!-- <span class="form-control ps-2 input-qty bg-white">01</span> -->
                            <input type="text" class="form-control  text-center qty bg-white" value="1" disabled>
                            <button class="input-group-text plus">+</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <button class="btn btn-primary px-4 addTocartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart pe-1"></i>Add to
                            cart</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger px-4"><i class="fa fa-heart pe-1"></i>Add To Wishlist</button>
                    </div>
                </div>
                <hr>
                <h5>Product Description</h5>
                <p><?= $product['description']; ?></p>
            </div>
        </div>
    </div>

</div>




<?php
    } else {
        echo "Product Not Found";
    }
} else {
    
    echo "Something went Wrong";
}
?>
<?php include("./includes/footer.php"); ?>
<script>
    document.title="Product-view";
</script>