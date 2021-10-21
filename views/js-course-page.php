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
    <!---------------- Navigation Bar --------------->
    <header>
        <h1 class="logo"><a href="index.html">WebCoursera</a></h1>
      <ul class="main-nav">
        <li><a href="index.html">Home</a></li>
          <li><a href="login.html">Sign out</a></li>
      </ul>
        
    </header>
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
                </div>
            </div>
        </div>
    </section>

    <?php
    $str = file_get_contents('../courses.json');
    $json = json_decode($str, true);
?>
<!-- Reference Section -->
<section id="reference">
    <div class="th">
        <h2>References</h2>
    </div>
    <table>
        <?php foreach ($json['javascript']['resources'] as $x) {?>  
                <tr>
                    <td><i class="fas fa-file-alt"></i><a class="links" href="<?php echo $x['Link'] ?>"><?php echo $x['Title'] ?></a></td>
                    <td><input type="checkbox" name="" id=""></td>
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
                <td><input type="checkbox" name="" id=""></td>
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
                <td><input type="checkbox" name="" id=""></td>
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
                <td><input type="checkbox" name="" id=""></td>
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

</body>
</html>