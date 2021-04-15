<?php
    session_start();
    $_SESSION;
    include("connection.php");
    include("functions.php");

    $userdata = check_login($con);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">

    <style type="text/css">
    .quote img{width:85%;height:525px;align:center;padding-left:150px;}
    .don-btn, .req-btn {
    font-family: sans-serif;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    text-align: relative;
    text-transform: uppercase;
    width: 80px;
    border: 0;
    padding: 10px 0;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-left: 200px;
    border-radius: 5px;
    background-color: rgba(244, 91, 105, 1);
    @include transition(background-color 300ms);
  }
  .left {
    height: 200px;
    background-color: white;
    border-block-style: block;
    border-radius: 50%;
    padding-bottom: 50px;
    margin-bottom: 80px;
    }

    .left h3{
        margin-left: 100px;
        padding-top:80px;
        padding-bottom:40px;
    }

    /* Control the right side */
    .right {
    height: 200px;
    background-color: white;
    border-block-style: block;
    border-radius: 50%;
    padding-bottom:50px;
    }
    .right h3{
        margin-left: 100px;
        padding-top:80px;
        padding-bottom:40px;
    }

    footer {
    left: 0;
    padding:10px;
    position:fixed;
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
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="donate.php">Donate</a></li>
                <li><a href="request.php">Request</a></li>
            </ul>
        </nav>
    <div class="quote">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNAiS5THMF6wBE33ZYkHTKk0D-yB0Q9T-5jA&usqp=CAU">
        </div>

    <div class="left don-btns" style="float: left; width: 50%" >
            <h3>Ready to donate anyday? Then click below.</h3>
            <button type="submit" class="don-btn" onclick="window.location.href='donate.php';">>Donate</button>
    </div>

    <div class="right" style="float: right; width: 50%">

    <h3>Want blood? Click below to see donors available in your city.</h3>
    <button type="submit" class="req-btn" onclick="window.location.href='request.php';">Request</button>
    </div>

</body>

<footer>
    <div>
        <p>Copyright &copy; Group-19</p>
    </div>
</footer>

</html>