<?php include("./includes/header.php") ?>
<?php include("./includes/sidebar.php") ?>
<?php include('../middleware/adminMiddleware.php') ?>

<section class="home-section">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['id']))
                 {
                    $id = $_GET['id'];
                    $category=getById("categories",$id);
                    if(mysqli_num_rows($category) > 0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                            <div class="card">
                                <div class="head bg-primary pt-2">
                                    <div class="b pt-2">
                                        <a href="category.php" class="btn btn-warning float-end  fw-semibold fs-6">Back  <i class="fa-solid  fa-circle-chevron-right"></i></a>

                                    </div>
                                    <h4 class="pt-2 text-light"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i>Edit Category</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="category_id" value="<?=$data['id']?>">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $data['name']?>" placeholder="Enter Category Name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Slug</label>
                                                <input type="text" name="slug" value="<?= $data['slug']?>" placeholder="Enter slug" class="form-control">
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Description</label>
                                                <textarea rows="3" name="description"  placeholder="Enter description" id="" class="form-control"><?= $data['description']?></textarea>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Upload Image</label>
                                                <input type="file" name="image"  class="form-control" id="">
                                                <label for="">Current Image</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image']?>" >
                                                <img class=" p-1" src="../uploads/<?=$data['image']?>" height="50px" width="" alt="">
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Title</label>
                                                <input rows="3" type="text" name="meta_title" value="<?= $data['meta_title']?>" placeholder="Enter meta description" class="form-control" id=""></input>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Description</label>
                                                <textarea type="text" name="meta_description"  placeholder="Enter meta keyword" class="form-control" id=""><?= $data['meta_description']?></textarea>
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <label for="">Meta Keyword</label>
                                                <textarea type="text" name="meta_keywords"  placeholder="Enter meta title" class="form-control" id=""><?= $data['meta_keywords']?></textarea>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <label for="">Status</label>
                                                <input type="checkbox" name="status" <?= $data['status']? "checked":""?> id="">
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <label for="">Popular</label>
                                                <input type="checkbox" name="popular" <?= $data['popular']? "checked":""?> id="">
                                            </div>
                                            <div class="col-md-12 pt-2">
                                                <button type="submit" class="btn btn-dark" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        <?php
                    }
                    else
                    {
                        echo"Category not found";
                    }
                }
                else
                {
                    echo "Id Missing from Url";
                }
                ?>
            </div>

</section>

<?php include("./includes/footer.php") ?>