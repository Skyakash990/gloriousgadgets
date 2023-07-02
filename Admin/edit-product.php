<?php include("./includes/header.php") ?>
<?php include("./includes/sidebar.php") ?>
<?php include("../functions/myfunctions.php") ?>
<section class="home-section">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = getById("products", $id);

                    if (mysqli_num_rows($product) > 0) {
                        $data = mysqli_fetch_array($product);
                        ?>
                            <div class="card ">
                                <div class="head bg-primary pt-2">
                                    <div class="b pt-2">
                                        <a href="products.php" class="btn btn-warning fw-semibold float-end fs-6">Back  <i class="fa-solid fa-circle-chevron-right"></i></a>
                                    </div>
                                    <h4 class=" pt-2 text-light"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i>Edit Product</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Select Category</label>
                                                <select name="category_id" class="form-select">
                                                    <option selected>Select Category</option>
                                                    <?php
                                                    $categories = getAll('categories');
                                                    if (mysqli_num_rows($categories) > 0) {
                                                        foreach ($categories as $item) {
                                                    ?>
                                                            <option value="<?= $item['id'] ?>"<?= $data['category_id'] == $item['id']?'selected':''?>><?= $item['name'] ?></option>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No category Found";
                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $data['id'];?>">
                                            <div class="col-md-6 pt-2">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $data['name'];?>" required placeholder="Enter Product Name" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <label for="">Slug</label>
                                                <input type="text" name="slug" value="<?= $data['slug'];?>"  required placeholder="Enter slug" class="form-control">
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Small Description</label>
                                                <textarea rows="3" name="small_description" required placeholder="Enter small description" id="" class="form-control"><?= $data['small_description'];?></textarea>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Description</label>
                                                <textarea rows="3" name="description" required placeholder="Enter Description" id="editor1" class="form-control"><?= $data['description'];?></textarea>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <label for="">Original Price</label>
                                                <input type="text" name="original_price" value="<?= $data['original_price'];?>" required placeholder="Enter Original Price" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <label for="">Selling Price</label>
                                                <input type="text" name="selling_price" value="<?= $data['selling_price'];?>" required placeholder="Selling Price" class="form-control">
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <label for="">Upload Image</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                                                <input type="file" name="image" class="form-control" id="">
                                                <div class="pt-2">
                                                    <label for="">Current Image</label>
                                                    <img src="../uploads/<?= $data['image'];?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-2">
                                                    <label for="">Quantity</label>
                                                    <input type="number" name="qty" value="<?= $data['qty'];?>" required placeholder="Enter Quantity" class="form-control">
                                                </div>
                                                <div class="col-md-3 pt-5">
                                                    <label for="">Status</label>
                                                    <input type="checkbox" name="status" <?= $data['status']=='0'?'':'checked'?> id="">
                                                </div>
                                                <div class="col-md-3 pt-5">
                                                    <label for="">Trending</label>
                                                    <input type="checkbox" name="trending" <?= $data['trending']=='0'?'':'checked'?>  id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Title</label>
                                                <input rows="3" type="text" name="meta_title" value="<?= $data['meta_title'];?>" required placeholder="Enter meta description" class="form-control" id=""></input>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Description</label>
                                                <textarea type="text" name="meta_description" required placeholder="Enter meta keyword" class="form-control" id=""><?= $data['meta_description'];?></textarea>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Keyword</label>
                                                <textarea type="text" name="meta_keywords" required placeholder="Enter meta title" class="form-control" id=""><?= $data['meta_keywords'];?></textarea>
                                            </div>

                                            <div class="col-md-12 pt-3">
                                                <button type="submit" class="btn btn-dark" name="update_product_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo"Product not found for given Id";
                    }

                } else {
                    echo "Id missing from url";
                }

                ?>


            </div>
        </div>
    </div>
</section>
<script>
    document.title="Edit-product";
</script>

<?php include("./includes/footer.php") ?>