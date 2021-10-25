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

        require "../enrolUser.php";
        
        $enrol_id = enroll_user('JAVASCRIPT', $_SESSION['uname']);

        $str = file_get_contents('../courses.json');
        $json = json_decode($str, true);

        $resource_no = 1;

        require "../resourceStatus.php";
        $r_stat = getResourcesStatus($enrol_id, 'javascript');

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
    <?php
            require_once '../userCount.php';
            $count = get_count('JAVASCRIPT');
    ?>
    <!----------------  Web Coursera Intro  --------------->
    <section id="banner">
        <div class="banner1">
            <div class="slider">
                <img src="../assets/yellow-wallpaper-3.jpg" id="slideImg">
            </div>
            <div class="overlay">
                <div class="content">
                    <p class="promo-title">JavaScript</p>
                    <p>JavaScript is commonly used for creating web pages. </p>
                   <p>It allows us to add dynamic behavior to the webpage and add special effects to the webpage. On websites, it is mainly used for validation purposes.</p>
                    <!-----
                    <a href="https://www.youtube.com/watch?v=F-flvgL3huk"><img src="images/play-button-overlay-png-transparent.png" class="play-btn">Watch Videos</a>
                    --->
                    <h3>ENROLLMENTS : 
                        <?php echo $count ?>
                    </h3>
                    
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function onCheck(resource_id) {
            var enrollId = '<?php echo $enrol_id; ?>';
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    console.log("loaded success");
                }
            };
             xhttp.open("POST", "../handleResourceStatus.php", false);
             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xhttp.send("resource_id=r"+resource_id+"&course_name="+"javascript"+"&enrol_id="+enrollId);
             console.log("send" + resource_id);
        }   
    </script>
<!-- Reference Section -->
<div class="search-area">
            <input type="text" onkeyup="showResult(this.value)">
            <div id="livesearch"></div>
            <button type="submit"><i class="fa fa-search"></i></button>
    </div>
<section id="reference">
    <div class="th">
        <h2>References</h2>
    </div>
    <table>
        <?php foreach ($json['javascript']['resources'] as $x) {?>  
                <tr>
                    <td><i class="fas fa-file-alt"></i><a class="links" href="<?php echo $x['Link'] ?>"><?php echo $x['Title'] ?></a></td>
                    <td><input type="checkbox" name="<?php echo $resource_no++;?>" id="" onclick = "onCheck(this.name);" <?php echo $r_stat[$resource_no] == 1 ? "checked" : "";?> ></td>
                </tr>
        <?php } ?>
    </table>
</section>

<!-- Videos Section -->

<section id="lectures">
    <div class="th">
        <h2>Recorded Lectures</h2>
        <h3>Short Videos (Less than 30 min duration)</h3>
    </div>
    <table>
        <?php foreach ($json['javascript']['shortVideos'] as $x) {?>  
            <tr>
                <td><i class="fas fa-film"></i><a class="links" href="<?php echo $x['Link'] ?>"><?php echo $x['Title'] ?></a></td>
                <td><?php echo $x['Length']?></td>
                <td><input type="checkbox" name="<?php echo $resource_no++;?>" id="" onclick = "onCheck(this.name);" <?php echo $r_stat[$resource_no] == 1 ? "checked" : "";?> ></td>
            </tr>
        <?php } ?>
    </table>
    <div class="th">
        <h3>Medium Videos (30 - 120 min duration)</h3>
    </div>
    <table>
        <?php foreach ($json['javascript']['mediumVideos'] as $x) {?>  
            <tr>
                <td><i class="fas fa-film"></i><a class="links" href="<?php echo $x['Link'] ?>"><?php echo $x['Title'] ?></a></td>
                <td><?php echo $x['Length']?></td>
                <td><input type="checkbox" name="<?php echo $resource_no++;?>" id="" onclick = "onCheck(this.name);" <?php echo $r_stat[$resource_no] == 1 ? "checked" : "";?> ></td>
            </tr>
        <?php } ?>
    </table>
    <div class="th">
        <h3>Long Videos (Greater than 120 min duration)</h3>
    </div>
    <table>
        <?php foreach ($json['javascript']['longVideos'] as $x) {?>  
            <tr>
                <td><i class="fas fa-film"></i><a class="links" href="<?php echo $x['Link'] ?>"><?php echo $x['Title'] ?></a></td>
                <td><?php echo $x['Length']?></td>
                <td><input type="checkbox" name="<?php echo $resource_no++;?>" id="" onclick = "onCheck(this.name);" <?php echo $r_stat[$resource_no] == 1 ? "checked" : "";?> ></td>
            </tr>
        <?php } ?>
    </table>
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
  xmlhttp.open("GET","../livesearch-contents.php?q="+str+"&c_name=javascript",true);
  xmlhttp.send();
}
</script>
</body>
</html>