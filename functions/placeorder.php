<?php
session_start();
include("../config/dbcon.php");
if(isset($_SESSION['auth']))
{
    if(isset($_POST['placeOrder']))
    {
        $name=mysqli_real_escape_string($con,$_POST['name']); 
        $email=mysqli_real_escape_string($con,$_POST['email']); 
        $phone=mysqli_real_escape_string($con,$_POST['phone']); 
        $pin=mysqli_real_escape_string($con,$_POST['pin']); 
        $address=mysqli_real_escape_string($con,$_POST['address']); 
        $payment_mode=mysqli_real_escape_string($con,$_POST['payment_mode']); 
        $payment_id=mysqli_real_escape_string($con,$_POST['payment_id']); 
       
        if($name == ""||$email == "" ||$phone==""||$pin==""||$address=="")
        {
            
            $_SESSION['message']="All fields are mandatory";
            header('Location:../checkout.php');
            exit(0);
        }
       
        $userid=$_SESSION['auth_user']['user_id'];
        $query="SELECT c.id as cid,c.prod_id, c.prod_qty, p.id as pid, p.name,p.image,p.selling_price
         FROM cart c, products p WHERE c.prod_id=p.id AND c.user_id='$userid' ORDER BY c.id DESC";
        $query_run = mysqli_query($con, $query);
       
         $total = 0;
            foreach ($query_run as $citem) 
            {   
                 $total += $citem['selling_price'] * $citem['prod_qty'];
            }

        $tracking_no="Track".rand(1111,9999).substr($phone,2);
        
        $insert_query="INSERT INTO orders (tracking_id,user_id,name,email,	phone,address,pincode,total_price,payment_mode,payment_id)
        VALUES('$tracking_no','$userid','$name',' $email','$phone','$address','$pin','$total','$payment_mode','$payment_id')";
        $insert_query_run=mysqli_query($con,$insert_query);
        if($insert_query_run)
        {
            $order_id=mysqli_insert_id($con);
            foreach ($query_run as $citem) 
            {   
                $prod_id=$citem['prod_id'];
                $prod_qty=$citem['prod_qty'];
                $price=$citem['selling_price'];
                $insert_items_query="INSERT INTO order_items(order_id,prod_id,qty,price)VALUES('$order_id',' $prod_id','$prod_qty','$price')";
                $insert_items_query_run=mysqli_query($con,$insert_items_query);

                $product_query="SELECT * FROM products WHERE id='$prod_id' limit 1";
                $product_query_run=mysqli_query($con,$product_query);

                $productdata=mysqli_fetch_array($product_query_run);
                $current_qty=$productdata['qty'];
                $new_qty=$current_qty-$prod_qty;

                $updateQty_query="UPDATE products SET qty='$new_qty' WHERE id='$prod_id' ";
                $updateQty_query_run=mysqli_query($con,$updateQty_query);
            }
            $deleteCart="DELETE FROM cart WHERE user_id='$userid'";
            $deleteCart_run=mysqli_query($con,$deleteCart);

            $_SESSION['message']="Order placed successfully";
            header('Location:../my-orders.php');
            die();

        }
    }
}
else
{
    header('Location:../index.php');
}

?>