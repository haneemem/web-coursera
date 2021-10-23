<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Animated Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/login_style.css">
</head>
<body>
    <video autoplay loop muted plays-inline id="backVideo">
        <source src="../assets/login_video.mp4" type="video/mp4">
    </video>

    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="uname" required>
                <span></span>
                <label>Username</label>
            </div>
            
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="signup.php">Signup</a>
            </div>
        </form>
    </div>

<?php

require_once '../connection.php';
require_once '../validation.php';

$err_msg = "";

if(isset($_POST['uname'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter Username and Password!";
        //require 'views/login_view.php';
    }
    else{

        $hashed_pwd = hash("sha256",$_POST['pwd']);

        $conn = connect_database();

        if(empty($err_msg)){
            //echo "<script>alert('hello');</script>";
            $qry = "SELECT username FROM user WHERE 
            username ='{$_POST['uname']}' AND hashed_pwd='{$hashed_pwd}';";

            $res = mysqli_query($conn, $qry);

            $res = mysqli_fetch_assoc($res);

            mysqli_close($conn);
            
            if($res)
            {                           //Login Successful. Setting up session
                session_start();
                $_SESSION['uname'] = $res['username'];

                // $conn = connect_database();
                // $qry = "INSERT INTO SESSION_USER SELECT '{$res['U_ID']}','{$_POST['type']}' 
                //         WHERE NOT EXISTS (SELECT * FROM SESSION_USER WHERE U_ID='{$res['U_ID']}'); ";

                // $res = mysqli_query($conn, $qry);

                // if(!$res)
                //     die(mysqli_error($conn));

                // mysqli_close($conn);

                //echo "<script>alert('hello');</script>";
                header("Location: index.php");
            }
            else {
                $err_msg = "Invalid Login!";
                echo "<script>alert('$err_msg');</script>";
                //equire 'views/login_view.php';
            }
        }

    }
}

?>
    
</body>
</html>