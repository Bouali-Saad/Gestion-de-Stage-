<?php 
include_once('../database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="login_form">
        <h1>ADMIN LOGIN</h1>
        <form method="POST">
            <div class="input_field">
                <i class="fa fa-user"></i>
                <input type="text" placeholder="Admin Name" name="AdminName">
            </div>
            <div class="input_field">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" name="AdminPassword">
            </div>

            <button type="submit" name="Signin">Sign In</button>

            <div class="extra">
                <a href="#">Forgot password ?</a>
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['Signin'])){
        $query="SELECT * FROM `admin` WHERE `Admin_name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['AdminLoginId']=$_POST['AdminName'];
            header("location: Panel.php");
        }else{
            echo"<script>alert('incorrect Password or Admin Name');</script>";
        }
    }
    
    ?>
</body>
</html>