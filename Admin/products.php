<?php
include('./includes/header.php');
include('./includes/sidebar.php');

include('../middleware/adminMiddleware.php');


?>
<section class="home-section ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                         <!-- View product by category
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
                        </div>  -->

                    </div>
                    <div class="card-body" >
                        <table class="table table-bordered" id="product-table"   >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                              

                                
                                $products = getAll('products');
                                // $cat = getAll("categories");
                                // if(mysqli_num_rows($cat)>=0)
                                // {
                                //     foreach($cat as $catitem)
                                //     {
                                if (mysqli_num_rows($products) >= 0) {
                                    foreach ($products as $item) {
                                ?>
                                        <tr>
                                            <td ><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>" width="50px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td>
                                                <?= $item['status'] == '0' ? "Visible" : "Hidden " ?>
                                            </td>
                                        
                                            <td>
                                                <div class="act d-flex">
                                                    <div class="edt">
                                                        <a href="edit-product.php?id=<?= $item['id']; ?> " class="btn btn-dark">Edit</a>
                                                    </div>
                                                    <div class="dlt ps-4">
                                                        <!-- <form action="" method="POST"> -->
                                                            
                                                            <!-- <input type="submit" value="delete" class="btn btn-danger" name="delete_category_btn"> -->
                                                            <button type="button" class="btn btn-danger delete_product"  value="<?= $item['id']; ?>">Delete</button>
                                                        <!-- </form> -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                <?php
                                    }
                                } 
                                else
                                {
                                    echo "No Record Found";
                                }
                                // }

                                // }
                            
                                ?>
                            
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php include('./includes/footer.php') ?>
<script>
    document.title="Product";
</script>