<?php include("./includes/header.php") ?>
<?php include("./includes/sidebar.php") ?>
<section class="home-section">

  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4>Add Category</h4>
          </div>
          <div class="card-body">
            <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Name</label>
                  <input type="text" name="name" placeholder="Enter Category Name" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-6">
                  <label for="">Slug</label>
                  <input type="text" name="slug" placeholder="Enter slug" class="form-control">
                </div>
                <div class="col-md-12 pt-2">
                  <label for="">Description</label>
                  <textarea rows="3" name="description" placeholder="Enter description" id="" class="form-control"></textarea>
                </div>
                <div class="col-md-12 pt-2">
                  <label for="">Upload Image</label>
                  <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="col-md-12 pt-2">
                  <label for="">Meta Title</label>
                  <input rows="3" type="text" name="meta_title" placeholder="Enter meta description" class="form-control" id=""></input>
                </div>
                <div class="col-md-12 pt-2">
                  <label for="">Meta Description</label>
                  <textarea type="text" name="meta_description" placeholder="Enter meta keyword" class="form-control" id=""></textarea>
                </div>
                <div class="col-md-12 pt-2">
                  <label for="">Meta Keyword</label>
                  <textarea type="text" name="meta_keywords" placeholder="Enter meta title" class="form-control" id=""></textarea>
                </div>
                <div class="col-md-6 pt-2">
                  <label for="">Status</label>
                  <input type="checkbox" name="status" id="">
                </div>
                <div class="col-md-6 pt-2">
                  <label for="">Popular</label>
                  <input type="checkbox" name="popular" id="">
                </div>
                <div class="col-md-12 pt-2">
                  <button type="submit" class="btn btn-dark " name="add_category_btn">Add Category</button>
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