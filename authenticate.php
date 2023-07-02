<?php
if(!isset($_SESSION['auth']))
{
    redirect("login/Signin.php","Login To Continue");
}
?>