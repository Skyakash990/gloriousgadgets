<?php
include('./includes/header.php');
include('./includes/sidebar.php');

include('../middleware/adminMiddleware.php');


?>
<section class="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All categories</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $category = getAll("categories");

                                if (mysqli_num_rows($category) >= 0) {
                                    foreach ($category as $item) {
                                ?>
                                        <tr class="">
                                            <td><?= $item['id']; ?></td>
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
                                                        <a href="edit-category.php?id=<?= $item['id']; ?> " class="btn btn-dark">Edit</a>

                                                    </div>
                                                    <div class="dlt ps-4">
                                                        <form action="code.php" method="POST">
                                                            <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                            <!-- <input type="submit" value="delete" class="btn btn-danger" name="delete_category_btn"> -->
                                                            <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }


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