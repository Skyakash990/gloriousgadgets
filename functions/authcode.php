
<?php
session_start();
include('../config/dbcon.php'); 
include('../functions/myfunctions.php');

if(isset($_POST['signup']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['re_pass']);
    $u_type=mysqli_real_escape_string($con,$_POST['u_type']);

        
        //check if email already exist
        $check_email_query="select email from user where email='$email' ";
        $check_email_query_run=mysqli_query($con,$check_email_query);

        if(mysqli_num_rows($check_email_query_run)>0)
        {
            $_SESSION['message']="Email already exist";
            header('Location:../login/Signup.php');
        }
        else
        {
            if(strlen($pass) < 8){
                redirect('../login/Signup.php','password Length Should Greter Than 8');
            }
            if($pass==$cpass)
            {
             $insert_query="insert into user (name,email,password,cpassword,usertype) values('$name','$email','$pass','$cpass','$u_type')";
             $insert_query_run =mysqli_query($con,$insert_query);
    
             
                if($insert_query_run)
                 {
                    redirect('../login/Signin.php','Signup Successfully');
                    
                }
                else
                {
                    
                  redirect('../login/Signup.php','Something Went Wrong');
                  
                }
            }
            else
            {
                redirect('../login/Signup.php','password do not match');
                
            }
            
            
        }
    
       
    }
else if(isset($_POST['signin']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['pass']);
    
    $login_query="SELECT * FROM user WHERE email='$email' AND password='$password' ";
    $login_query_run =mysqli_query($con,$login_query);
    if(mysqli_num_rows($login_query_run)>0)
    {
        $_SESSION['auth']=true;

        $userdata = mysqli_fetch_array($login_query_run);

        $userid =$userdata['id'];
        $username =$userdata['name'];
        $useremail =$userdata['email'];
        $usertype =$userdata['usertype'];
         
        $_SESSION['auth_user']=[
            'user_id'=>$userid,
            'name'=>$username,
            'email'=>$useremail
            
        ];
        $_SESSION['user_type']=$usertype;
        // if($role_as == 1)
        // {
        //     redirect('../admin/index.php','Welcome To Dashboard');
            
        // }
        // else{
            
            // }
            
                redirect('../index.php','Logged in successfully');
        
        
    }
    else
    {
        redirect('../login/Signin.php','Invalid Credentials');
     
    }
}

?>