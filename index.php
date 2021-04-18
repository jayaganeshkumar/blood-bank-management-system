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
            <li><a href="#">About</a></li>
            <li><a href="#">Donate</a></li>
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
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="data:image/png;base64,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" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="https://cdn.quotesgram.com/img/10/53/331685504-blood_what_is.jpg" style="width:100%">
  <div class="text">Caption Three</div>
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
        <p>Copyright &copy; Group-19</p>
    </div>
</footer>
<script src="script.js"></script>
<script src="slideshow.js"></script>
</html>