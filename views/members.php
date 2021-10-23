<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/course-page-style.css">
    <title>Web Coursera</title>
</head>
<body>
    <?php
        session_start(); 
    ?>
    <!---------------- Navigation Bar --------------->
    <header>
        <h1 class="logo"><a href="index.php">WebCoursera</a></h1>
      <ul class="main-nav">
          <li><a href="index.php">Home</a></li>
          <?php if(!isset($_SESSION['uname'])) {?>
          <li><a href="login.php">Sign In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <?php } ?>
          <?php if(isset($_SESSION['uname'])) {?>
            <li><a href="logout.php">Sign out</a></li>
          <?php } ?>
          
      </ul>
        
    </header>
    <!---------------- Courses Section ----------------->

    <?php
        require "../connection.php";
        $conn = connect_database();

        $qry = "SELECT first_name, last_name, institute FROM user;";

        $res = mysqli_query($conn, $qry);
        $res = mysqli_fetch_all($res);
        
        $user_list = array();

        $sl_no = 1;
        foreach($res as $x => $x_value) {
            array_push($user_list, $x_value);
        }
        mysqli_close($conn);
    ?>
    <section class="main-area">
        <h1 class="course-heading">MEMBERS</h1>
        <section id="reference">
        <div class="th">
            <h2></h2>
        </div>
        <table>
            <tr>
                <th>Sl No</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>Institute</th>
            </tr>
            <?php foreach ($user_list as $x) {?>  
                    <tr>
                        <td style = "text-align: center;"><?php echo $sl_no++; ?></td>
                        <td style = "text-align: center;"><?php echo $x[0] ?></td>
                        <td style = "text-align: center;"><?php echo $x[1] ?></td>
                        <td style = "text-align: center;"><?php echo $x[2] ?></td>
                    </tr>
            <?php } ?>
        </table>
        </section>
    </section>
    
    <!----------------- Footer Section -------------------->

    <footer>
        <div class = "footer-box">
            <div class="footer-links">
                <div>
                    <a href="termsAndConditions.html">Terms & Conditions</a>
                </div>
                <div>
                    <a href = "privacyPolicy.html">Privacy Policy</a>
                </div>
                <div>
                    <a href = "help-and-support.html">Help and Support</a>
                </div>
                <div>
                    <a href = "aboutUs.html">About Us</a>
                </div>
                <div>
                    <a href = "mailto:info@webcoursera.com">Contact Us</a>
                </div>
            </div>
            <div>
                <p>&copy; 2021 Web Coursera All rights reserved </p>
            </div>
            
        </div>
    </footer>
</body>
</html>