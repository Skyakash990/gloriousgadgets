<?php session_start();
include("./functions/userfunctions.php");
include("./includes/header.php");
include("authenticate.php");

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


<div class="py-5">
    <div class="container">
        <!-- <div class="row"> -->
            <div class="col-md-12">
                <!-- <div class="card"> -->
                    <div class="head bg-warning">
                        <a href="my-orders.php" class="btn btn-danger float-end"> <i class="fa fa-reply"></i> Back</a>
                        <h4 class="pt-2 text-laght"> View-Order</h4>
                    </div>
                    <div class="card-body">
                        <div class=" p-4">
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
                                            $userid=$_SESSION['auth_user']['user_id'];
                                            $order_query="SELECT o.id as oid,o.tracking_id,o.user_id, oi.*,oi.qty as orderqty,  p.* FROM orders o,order_items oi,
                                            products p WHERE o.user_id='$userid' AND oi.order_id=o.id AND p.id=oi.prod_id
                                            AND o.tracking_id='$tracking_no' ";
                                            $order_query_run=mysqli_query($con,$order_query);
                                            if(mysqli_num_rows($order_query_run)>0)
                                            {
                                                foreach($order_query_run as $item)
                                                {
                                                    ?>
                                                        <tr>
                                                            <td class=" align-middle">
                                                                <img src="uploads/<?=$item['image'];?>" width="60px" height="80px" alt="<?=$item['name'];?>">
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
                                <label  class=" fs-5 pt-5">Payment Mode</label>
                                <div class="border pt-1">
                                    <?=$data['payment_mode']?>
                                </div>
                                <label class=" fs-5 pt-1">Status</label>
                                <div class="border pt-1 ">
                                    <?php
                                        if($data['status'] == 0)
                                        {
                                            ?>
                                            <h5 class=" text-danger p-1">Pending</h5>
                                            <?php
                                            // echo"<h6>Pending</h6>";
                                        }
                                        else if($data['status']==1)
                                        {
                                            ?>
                                            <h5 class=" text-success p-1">Dispatch</h5>
                                            <?php
                                            // echo"Order Details Recieved";
                                        }
                                        else if($data['status']==2)
                                        {
                                            ?>
                                            <div><h5 class="text-primary p-1">Completed</h5></div>
                                            <?php
                                if($data['status']==2)           
                                {
                                ?>
                                <a href="bill.php?id=<?php echo $data['id']; ?>" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-print"></i></a>
                                <?php
                                }
                                ?>
                                            <?php
                                            // echo"Completed";
                                        }
                                        else if($data['status']==3)
                                        {
                                            echo"Cancelled";
                                        }
                                
                                        

                                    ?>
                                    

<!-- </div><a href="bill.php?id=<?php echo $data['id']; ?>" class="btn btn-primary mt-2"><i class="fa-sharp fa-solid fa-print"></i></a> -->

                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            
            </div>
        </div>
    </div>

</div>





<?php include("./includes/footer.php"); ?>