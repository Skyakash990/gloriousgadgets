<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singup</title>
    <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style/auth.css">
</head>

<body>
    <div class="login">
        <form onsubmit="opop" action="../functions/authcode.php" method="POST" class="form">
            <div id="msg"class="col-md-12">
                <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey </strong><?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }
            ?>
            </div>
            <h2>Sign Up</h2>
            <div class="inputbox">
                <input type="text" required name="name" placeholder="Name"></input>
            </div>
            <div class="inputbox">
                <input type="text" required name="email" placeholder="Email"></input>
            </div>
            <div class="inputbox">
                <input type="password" required name="pass" placeholder="Password">
            </div>
            <div class="inputbox">
                <input type="password" required name="re_pass" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="u_type" value="user">
            <div class="inputbox">
                <input type="submit" name="signup" value="Signup" id="sibtn">
            </div>
            <div class="link">
                <label for="">SignUp With </label>

                <a href=""><img src="./Asset/search.png" alt=""></a>
                <a href=""><img src="./Asset/facebook.png" alt=""></a>
            </div>
        </form>
        <div class="svg">
            <img src="./Asset/2002.i515.001_modern_students_flat_icons-13.jpg" alt="">
        </div>
    </div>

</body>
<script src="../bootstrap-5.2.2-dist/js/bootstrap.js"></script>
<script>
const opop = (event) =>{
    console.log("ADSD")
    event.preventDefault();
};
// let msg=document.getElementById()
</script>

</html>