<?php
 
    $host="localhost";
    $username="root";
    $password="";
    $database="e_com";

    // creating database connection
    $con=mysqli_connect($host,$username,$password,$database);

    //check con
    if(!$con){
        die("connection Failed:".mysqli_connect_error());

    }
    else
    {
        echo "";
    }



?>