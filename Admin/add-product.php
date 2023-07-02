<?php include("./includes/header.php") ?>
<?php include("./includes/sidebar.php") ?>
<?php include("../functions/myfunctions.php") ?>
<section class="home-section">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Add Product</h4>
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
                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php
                                            }
                                        } else {
                                            echo "No category Found";
                                        }

                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" required placeholder="Enter Product Name" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" required placeholder="Enter slug" class="form-control">
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Small Description</label>
                                    <textarea rows="3" name="small_description"  required placeholder="Enter small description" id="" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Description</label>
                                    <textarea rows="3" name="description" required placeholder="Enter Description" id="editor1" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="">Original Price</label>
                                    <input type="text" name="original_price" placeholder="Enter Original Price" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="selling_price" required placeholder="Selling Price" class="form-control">
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" required class="form-control" id="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pt-2">
                                        <label for="">Quantity</label>
                                        <input type="number" name="qty" required placeholder="Enter Quantity" class="form-control">
                                    </div>
                                    <div class="col-md-3 pt-5">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status"  id="">
                                    </div>
                                    <div class="col-md-3 pt-5">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" id="">
                                    </div>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Meta Title</label>
                                    <input rows="3" type="text" name="meta_title" required placeholder="Enter meta description" class="form-control" id=""></input>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" required placeholder="Enter meta keyword" class="form-control" id=""></textarea>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keywords" required placeholder="Enter meta title" class="form-control" id=""></textarea>
                                </div>

                                <div class="col-md-12 pt-3">
                                    <button type="submit" class="btn btn-dark" name="add_product_btn">Add Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("./includes/footer.php") ?>