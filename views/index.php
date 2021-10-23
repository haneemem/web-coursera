<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/style.css">
    <title>Web Coursera</title>
    <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        console.log(this.responseText);
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.width = "650px";
      document.getElementById("livesearch").style.margin = "10px auto";
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","../livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body onload="slider()">
    <?php
        session_start(); 
    ?>
    <!---------------- Navigation Bar --------------->
    <header>
        <h1 class="logo"><a href="#">WebCoursera</a></h1>
      <ul class="main-nav">
          <li><a href="#">Home</a></li>
          <li><a href="members.php">MEMBERS</a></li>
          <?php if(!isset($_SESSION['uname'])) {?>
          <li><a href="login.php">Sign In</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <?php } ?>
          <?php if(isset($_SESSION['uname'])) {?>
            <li><a href="logout.php">Sign out</a></li>
          <?php } ?>
      </ul>
        
    </header>
    <!----------------  Web Coursera Intro  --------------->
    <section id="banner">
        <div class="banner1">
            <div class="slider">
                <img src="../assets/capture.jpg" id="slideImg">
            </div>
            <div class="overlay">
                <div class="content">
                    <p class="promo-title">Web Coursera</p>
                    <p class="promo">ABOUT US</p>
                    <p>Web  Coursera partners with leading universities and companies to bring flexible, affordable, job-relevant online learning to individuals and organizations worldwide. We offer a range of learning opportunities—from hands-on projects and courses to job-ready certificates and degree programs.</p>
                    <!-----
                    <a href="https://www.youtube.com/watch?v=F-flvgL3huk"><img src="images/play-button-overlay-png-transparent.png" class="play-btn">Watch Videos</a>
                    --->
                </div>
            </div>
        </div>
    </section>

    <!---------------- Courses Section ----------------->

    <?php
        require "../connection.php";
        $conn = connect_database();

        $qry = "SELECT c_name FROM course INNER JOIN enrollment ON (course.c_id = enrollment.c_id AND enrollment.username ='{$_SESSION['uname']}');";

        $res = mysqli_query($conn, $qry);
        $res = mysqli_fetch_all($res);
        
        $course_list = array();


        foreach($res as $x => $x_value) {
            array_push($course_list, $x_value[0]);
        }
        // if (in_array("JAVA", $course_list, TRUE))
        // {
        //     echo "found \n";
        // }
        // else
        // {
        //     echo "not found \n";
        // }
        mysqli_close($conn);
    ?>
    <section class="main-area">
        <h1 class="course-heading">COURSES</h1>
        <div class="search-area">
            <input type="text" onkeyup="showResult(this.value)">
            <div id="livesearch"></div>
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
        <div class="container flex">
            <div class="card">
                <img src="../assets/service1.png" alt="">
                
                <a href="../views/html-course-page.php"><button><?php echo is_enrolled("HTML", $course_list); ?></button></a>
            </div>
            <div class="card">
                <img src="../assets/service2.png" alt="">
                <a href="../views/css-course-page.php"><button><?php echo is_enrolled("CSS", $course_list); ?></button></a>
            </div>
            <div class="card">
                <img src="../assets/service3.png" alt="">
                <a href="../views/js-course-page.php"><button><?php echo is_enrolled("JAVASCRIPT", $course_list); ?></button></a>
            </div>
            <div class="card">
                <img src="../assets/service4.png" alt="">
                <a href="../views/java-course-page.php"><button><?php echo is_enrolled("JAVA", $course_list); ?></button></a>
            </div>
            <div class="card">
                <img src="../assets/service5.png" alt="">
                <a href="../views/ajax-course-page.php"><button><?php echo is_enrolled("AJAX", $course_list); ?></button></a>
            </div>
            <div class="card">
                <img src="../assets/service6.jpg" alt="">
                <a href="../views/python-course-page.php"><button><?php echo is_enrolled("PYTHON", $course_list); ?></button></a>
            </div>
            
        </div>
    </section>
    <!------------------Social Media----------------------->
    <section class="social-media">
        <div class="container">
            <p>FIND US ON SOCIAL MEDIA</p>
            <div class="social-icons">
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-whatsapp"></i></a>
                <a href=""><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
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
    <?php 
        function is_enrolled($check, $course_list){
            if (in_array($check, $course_list, TRUE))
            {
                return "CONTINUE";
            }
            else
            {
                //echo "Enrol";
                return "ENROLL NOW";
            }
        }
    ?>
    <script>
        var slideImg=document.getElementById("slideImg");
        var images = new Array(
            "../assets/capture.jpg",
            "../assets/capture2.jpeg"
        );
        var len = images.length
        var i = 0;
        function slider(){
            if(i>len-1){
                i=0;
            }
            slideImg.src=images[i];
            i++;
            setTimeout('slider()',3000);
        }
    </script>
</body>
</html>