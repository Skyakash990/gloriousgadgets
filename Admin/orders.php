<?php 
 
include("./includes/header.php");
include("./includes/sidebar.php");
include("../middleware/adminMiddleware.php");

?>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Orders</h4>
                    </div>
                    
                    <div class="card-body">
                    
                    <table class="table table-bordered  table-striped-columns shadow">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <?php
                        $orders = getAllOrder();
                        if (mysqli_num_rows($orders) > 0) {
                            foreach ($orders as $items) {
                        ?>
                                <tr>
                                    <td><?=$items['id'];?></td>
                                    <td><?=$items['name'];?></td>
                                    <td><?php
                                        if($items['status'] == 0)
                                        {
                                            ?>
                                            <h5 class=" text-danger p-1">Pending</h5>
                                            <?php
                                            // echo"<h6>Pending</h6>";
                                        }
                                        else if($items['status']==1)
                                        {
                                            ?>
                                            <h5 class=" text-success p-1">Dispatch</h5>
                                            <?php
                                            // echo"Order Details Recieved";
                                        }
                                        else if($items['status']==2)
                                        {
                                            ?>
                                            <h5 class="text-primary p-1">Completed</h5>
                                            <?php
                                            // echo"Completed";
                                        }
                                        else if($items['status']==3)
                                        {?>
                                            <h5 class=" text-warning p-1">Cancelled</h5>
                                            <?php
                                        }
                                


                                    ?></td>
                                    <td><?=$items['total_price'];?></td>
                                    <td><?=$items['created_at'];?></td>
                                    <td>
                                        <a href="view-order.php?t=<?=$items['tracking_id'];?>" class="btn btn-dark">View Details</a>
                                    </td>
                                </tr>

                        <?php

                            }
                        } else {
                                ?>
                                <tr>
                                     <td colspan="5">No Orders Yet</td>
                                
                                </tr>

                                <?php  
                        }

                        ?>
                        <tbody>

                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</div>


<script>
    document.title="Orders";
</script>


<?php include("./includes/footer.php"); ?>