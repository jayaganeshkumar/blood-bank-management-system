<?php
include('connection.php');
include('functions.php');
session_start();
$_SESSION;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="navbar.css">
    <style>
        .quote img{width:90%;height:550px;align:center;padding-left:150px;padding-top:5px}
        h3{text-align:center;padding:50px}
        .about p{padding:30px;font-size:20px;}
        .about ul{padding:20px; font-size:20px}
        .about ul li{padding:20px;font-size:20px}
        footer {
        left: 0;
        padding:10px;
        /* position:fixed; */
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <h4>Blood-Bank</h4>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="user_page.php">User-Page</a>
            <?php }else{?><a href="register.php">Register</a><?php }?></li>
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="logout.php">Logout</a>
        <?php }else{?>
            <a href = "login.php">Login</a>
        <?php } ?></li>
        </ul>
    </nav>

    <div class="quote">
        <img src="imgs/aboutus.jpg">
    </div>

    <div class="about">
        <h3>About Developers</h3>
        <p>We are the students of CSE-A of 2019 batch. It was the first idea that came in our minds and proceeded with it.</p>
        <ul>
            Group-19 :: Developer include
            <li>Jaya Ganesh Kumar Gudipati - AP19110010007</li>
            <li>Akash Reddy Narala - AP19110010018</li>
            <li>Sai Sri Ram Kumar Macha - AP19110010138</li>
        </ul>

    </div>
</body>
<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color:white">Group-19</a></p>
    </div>
</footer>
</html>