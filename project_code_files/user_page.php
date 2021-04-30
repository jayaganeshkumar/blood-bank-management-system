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
    <title>User Page - Blood Bank</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">

    <style type="text/css">
    .quote img{width:85%;height:525px;align:center;padding-left:150px;}
    .don-btn{
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
  .req-btn {
    font-family: sans-serif;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    text-align: relative;
    text-transform: uppercase;
    width: 100px;
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
    border-color: black;
    padding-bottom: 50px;
    margin-bottom: 80px;
    }

    .left h3{
        margin-left: 100px;
        padding-top:80px;
        padding-bottom:40px;
        color:rgb(255,0,255);
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
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="donate.php">Donate</a></li>
                <li><a href="request.php">Request</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    <div class="quote">
            <img src="imgs/userpage.jpeg">
        </div>
    <div class="intro">
        <h2 style="text-align:center;padding-top:20px;padding-bottom:20px;">Hello, <?php echo $userdata['username'] ?></h2>
    </div>
    <div class="left don-btns" style="float: left; width: 50%">
    <?php 
    $username = $userdata['username'];
    $query = "select * FROM blood_bank WHERE username = '$username'";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){?> <h3>You are already registered as donor!</h3>
    <?php }else{?>
            <h3>Ready to donate anyday? Then click below.</h3>
            <button type="submit" class="don-btn" onclick="window.location.href='donate.php';">Donate</button>
            <?php } ?>
    </div>

    <div class="right" style="float: right; width: 50%">

    <h3>Want blood? Click below to see donors available in your city.</h3>
    <button type="submit" class="req-btn" onclick="window.location.href='request.php';">Request</button>
    </div>

</body>

<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color: white;">Group-19</a></p>
    </div>
</footer>

</html>