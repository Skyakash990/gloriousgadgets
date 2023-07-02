<?php session_start()?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <div class="login">
        <form action="../functions/authcode.php" method="POST" class="form">
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
            <h2>Sign In</h2>
            <div class="inputbox" class="">
                <input type="text" name="email"  placeholder="Email"></input>

            </div>
            <div class="inputbox">
                <input type="password" class="op" name="pass" placeholder="Password">
                <!-- <i style="padding:0.85rem;" id="eyeicon"
                    class=" fa-solid fa-eye ms-0 border border-2 border-dark  position-absolute "></i> -->
            </div>
            <div class="inputbox">
                <input type="submit" name="signin" value="Signin" id="sibtn">
            </div>

            <div class="link">
                <label for="">Continue With </label>

                <a href=""><img src="./Asset/search.png" alt=""></a>
                <a href=""><img src="./Asset/facebook.png" alt=""></a>
            </div>
            <div class="group">
                <a href="#">Forget Password?</a>
                <a href="./signup.php">SignUp</a>
            </div>
        </form>
        <div class="svg">
            <img src="./Asset/2002.i039.018_remote_management_distant_work_isometric_icons-15.jpg" alt="">
        </div>

    </div>



</body>
<script src="../bootstrap-5.2.2-dist/js/bootstrap.js"></script>
<script>
let eye = "password";
const op = document.querySelector(".op");
document.getElementById("eyeicon").addEventListener("click", () => {
    if (eye === "password") {
        op.setAttribute("type", "text")
        eye = "text";
    } else {
        eye = "password";
        op.setAttribute("type", "password")
    }
    console.log("done")
})
</script>

</html>