<?php

include('../functions/myfunctions.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['user_type'] == "user")
    {
        redirect('./index.php','You are not authorized to access this page');
    
    }
}
else
{
    redirect('../login/Signin.php','Login To Continue');
  
}

?>