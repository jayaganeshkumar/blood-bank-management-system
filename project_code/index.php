<?php
    session_start();
    $_SESSION;
    include("connection.php");
    include("functions.php");
    if(check_login($con)){
    $_SESSION['username'] = check_login($con)['username'];}
    else{
        
    }
?>

<html>
<head>
    <title>Blood Bank Donation</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
    <nav>
        <div class="logo">
            <h4>Blood-Bank</h4>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="user_page.php">User-Page</a></li>
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="logout.php">Logout</a>
        <?php }else{?>
            <a href = "login.php">Login</a>
        <?php } ?></li>
        </ul>
    </nav>
    <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="quote1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="imgs/quote2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="imgs/quote3.jpg" style="width:100%">
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
<!-- slideshow ends -->

<!-- login and features tab -->
<div class="login-tab">
<div class="left" style="float: left; width: 50%" >
    <form class="login" id="navigation"><?php
    if(isset($_SESSION['username'])){?>
                <p>You are already logged in.</p>
        <?php }else{?>
        
    <a href="login.php" style="text-decoration: none" class="login-btn">Login</a><br><br>
    <p>Not registered? Click below to register.</p>
    <a href="register.php" class="register-btn">Register</a><br><?php } ?>
    </form>
</div>
    
<div class="right" style="float: right; width: 50%">
    <div class="features">
        <ul>
            <h3>Key Features</h3>
            <li>User-to-User interface</li>
            <li>Better safety of your login credentials</li>
            <li>Trusted blood donors</li>
        </ul>    
    </div>
</div>
</div>

</body>

<!-- footer -->
<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color: white;">Group-19</a></p>
    </div>
</footer>
<script src="script.js"></script>
<script src="slideshow.js"></script>
</html>