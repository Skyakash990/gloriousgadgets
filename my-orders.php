<?php session_start();
include("./functions/userfunctions.php");
include("./includes/header.php");
include("authenticate.php");
?>


<div class="py-5">
    <div class="container">
        <!-- <div class=""> -->
         

                <div class="col-md-10 table">
                
                    <table class="table table-bordered table-striped-columns shadow-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <?php
                        $orders = getOrder();
                        if (mysqli_num_rows($orders) > 0) {
                            foreach ($orders as $items) {
                        ?>
                                <tr>
                                    <td><?=$items['id'];?></td>
                                    <td><?=$items['tracking_id'];?></td>
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

        <!-- </div> -->
    </div>

</div>





<?php include("./includes/footer.php"); ?>
<script>
    document.title="Myoders";
</script>