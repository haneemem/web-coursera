<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Animated Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/signup_style.css">
</head>
<body>
    <video autoplay loop muted plays-inline id="backVideo">
        <source src="../assets/signup_video.mp4" type="video/mp4">
    </video>
    
    <div class="center">
        <h1>SignUp</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="uname" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="fname" required>
                <span></span>
                <label>First Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="lname" required>
                <span></span>
                <label>Last Name</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="institute" name="insti" required>
                <span></span>
                <label>Institute</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="error">
                <?=$err_msg?><br><br>
            </div>
            <input type="submit" value="Sign Up">
            <div class="signup_link">
                Already registered? <a href="#">Login</a>
            </div>
        </for>
    </div>
    
    <?php

require_once "../connection.php";
require_once "../validation.php";

$err_msg = "";

if(isset($_POST['uname'])) {

    //Input Data Validation

    if(empty_check($_POST)){
        $err_msg = "Enter data in all required fields";
        //require 'views/signup_view.php';
    }
    else{

        //Check if user already exists
        $conn = connect_database();
        $qry = "SELECT COUNT(*) FROM user WHERE username='{$_POST['uname']}'";
        $res = mysqli_query($conn,$qry);

        $res = mysqli_fetch_assoc($res);

        
        if(((int)$res['COUNT(*)'])>0){
            mysqli_close($conn);
            $err_msg = "User already exists!";
            //require 'views/signup_view.php';
        }

        if(empty($err_msg)){
            //Enter data to database

            $hashed_pwd = hash("sha256",$_POST['pwd']);

            $qry = "INSERT INTO user VALUES (
                '{$_POST['uname']}',
                '{$_POST['fname']}',
                '{$_POST['lname']}',
                '{$_POST['email']}',
                '{$_POST['insti']}',
                '$hashed_pwd');";

            $res = mysqli_query($conn,$qry);

            if(!$res){
                die("Data insertion failed : ".mysqli_error($conn));
            }
            mysqli_close($conn);
            // require "index.php";
            header("Location: index.php");
        }
        else{
        echo "<script>alert('$err_msg');</script>";
        }
    }

}

?>

</body>
</html>