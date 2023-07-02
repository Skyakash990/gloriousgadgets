<?php

include('config/dbcon.php');

    function getAllActive($table)
    {
        global $con;
        $query="SELECT * from $table WHERE status='0'";
        return $query_run = mysqli_query($con, $query);
    }
    function getAllTrending()
    {
        global $con;
        $query="SELECT * from products WHERE trending='1'";
        return $query_run = mysqli_query($con, $query);
    }
    function getIdActive($table,$id)
    {
        global $con;
        $query="SELECT * from $table where id='$id'AND status='0'";
        return $query_run = mysqli_query($con, $query);
    }
    function getSlugActive($table,$slug)
    {
        global $con;
        $query="SELECT * from $table where slug='$slug'AND status='0' LIMIT 1";
        return $query_run = mysqli_query($con, $query);
    }
    function getProductbycat($category_id)
    {
        global $con;
        $query="SELECT * from products where category_id='$category_id'AND status='0' ";
        return $query_run = mysqli_query($con, $query);
    }
    function getCartItems()
    {
        global $con;
        $userid=$_SESSION['auth_user']['user_id'];
        $query="SELECT c.id as cid,c.prod_id, c.prod_qty, p.id as pid, p.name,p.image,p.selling_price
         FROM cart c, products p WHERE c.prod_id=p.id AND c.user_id='$userid' ORDER BY c.id DESC";
         return $query_run = mysqli_query($con, $query);
    }
    function getOrder()
    {
        global $con;
        $userid=$_SESSION['auth_user']['user_id'];

        $query="SELECT * FROM orders WHERE user_id='$userid'";
        return $query_run=mysqli_query($con,$query);
    }
    
    function redirect($url,$message)
    {
        $_SESSION['message']=$message;
        header('Location:'.$url);
        exit();
    }
    function checkTrack($trackingno)
    {
        global $con;
        $userid=$_SESSION['auth_user']['user_id'];
        $query="SELECT * FROM orders WHERE tracking_id='$trackingno' AND user_id='$userid'";
        return mysqli_query($con,$query);

    }
?>