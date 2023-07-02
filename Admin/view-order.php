<?php 
 
include("./includes/header.php");
include("./includes/sidebar.php");
include("../middleware/adminMiddleware.php");

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $trackres = checkTrack($tracking_no);
    if (mysqli_num_rows($trackres) < 0) {

?>
        <h4>Something Went Wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something Went Wrong</h4>
<?php
    die();
}
$data=mysqli_fetch_array($trackres);
?>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="head bg-primary">
                        <a href="orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                        <h4 class=" pt-2 text-light"> View-Order</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Delivery Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Name</label>
                                        <div class="border p-1">
                                            <?=$data['name'];?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Email</label>
                                        <div class="border p-1">
                                            <?=$data['email'];?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Phone</label>
                                        <div class="border p-1">
                                            <?=$data['phone'];?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Tracking No</label>
                                        <div class="border p-1">
                                            <?=$data['tracking_id'];?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Address</label>
                                        <div class="border p-1">
                                            <?=$data['address'];?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class=" fw-semibold">Pincode</label>
                                        <div class="border p-1">
                                            <?=$data['pincode'];?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $order_query="SELECT o.id as oid,o.tracking_id,o.user_id, oi.*,oi.qty as orderqty,  p.* FROM orders o,order_items oi,
                                            products p WHERE oi.order_id=o.id AND p.id=oi.prod_id
                                            AND o.tracking_id='$tracking_no' ";
                                            $order_query_run=mysqli_query($con,$order_query);
                                            if(mysqli_num_rows($order_query_run)>0)
                                            {
                                                foreach($order_query_run as $item)
                                                {
                                                    ?>
                                                        <tr>
                                                            <td class=" align-middle">
                                                                <img src="../uploads/<?=$item['image'];?>" width="60px" height="80px" alt="<?=$item['name'];?>">
                                                            </td>
                                                            <td class=" align-middle"><?=$item['price'];?></td>
                                                            <td class=" align-middle"><?=$item['orderqty'];?></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                     </tbody>
                                </table>
                                <hr>
                                <h5>Total Price:<span class=" float-end"><?=$data['total_price']?></span></h5>
                                <label  class=" fw-semibold">Payment Mode</label>
                                <div class="border pt-1">
                                    <?=$data['payment_mode']?>
                                </div>
                                <label class=" fw-semibold">Status</label>
                                <div class=" pt-1">
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="tracking_id" value="<?=$data['tracking_id']?>">
                                        <select name="order_status" class="form-control">
                                            <option value="0"<?=$data['status']==0?"selected":"" ?>>Pending</option>
                                            <option value="1"<?=$data['status']==1?"selected":"" ?>>Dispatch</option>
                                            <option value="2"<?=$data['status']==2?"selected":"" ?>>Completed</option>
                                            <option value="3"<?=$data['status']==3?"selected":"" ?>>Cancelled</option>
                                        </select>
                                        <button type="submit" name="update_order" class="btn btn-primary mt-2 float-end">Update Status</button>               
                                    </form>
                                </div>
                                <?php
                                if($data['status']==2)           
                                {
                                ?>
                                <a href="bill.php?id=<?php echo $data['id']; ?>" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-print"></i></a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

</div> 





<?php include("./includes/footer.php"); ?>