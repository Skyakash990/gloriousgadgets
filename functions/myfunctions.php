<?php
include('../config/dbcon.php');
    function getAll($table)
    {
        global $con;
        $query="SELECT * from $table";
        return $query_run = mysqli_query($con, $query);
    }
    
    function getById($table,$id)
    {
        global $con;
        $query="SELECT * from $table where id='$id'";
        return $query_run = mysqli_query($con, $query);
    }
    function getbycategory($table,$category_id){
        global $con;
        $query="SELECT * from $table where id='$category_id'";
        return $query_run = mysqli_query($con, $query);
    }

    function redirect($url,$message)
    {
        $_SESSION['message']=$message;
        header('Location:'.$url);
        exit();
    }
    function getAllOrder()
    {  
        global $con;
        $query ="SELECT * FROM orders";
        return $query_run=mysqli_query($con,$query);
    } 
    function checkTrack($trackingno)
    {
        global $con;
       
        $query="SELECT * FROM orders WHERE tracking_id='$trackingno'";
        return mysqli_query($con,$query);

    }

?>