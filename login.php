<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $hash = hash("md5",$_POST['password']);

        // echo $username,$hash;

        if(!empty($username) && !empty($_POST['password']))
        {
            $query = "select * from user where username='$username' limit 1";
            $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result) == 0)
            {
                echo "No user found, check the details and if you are not registered, go to registration page.";
            }
            else
            {
                $user_data = mysqli_fetch_assoc($result);
                if($hash == $user_data['hash'])
                {
                    $_SESSION['username'] = $user_data['username'];
                    // echo 'Login Successful', $_SESSION['username'];
                    // // echo "<script>alert('Login Successful');</script>";
                    // $userdata = check_login($con);
                    // echo $userdata;
                    header("Location:user_page.php");
                    die;
                }
                else{
                    echo "Please enter correct password";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css" type="text/css">
    <title>Login</title>
    <style>
        .quote img{width:90%;height:575px;align:center;padding-left:150px;}

.login {
/* overflow: hidden; */
background-color: white;
margin-top:60px;
margin-left:120px;
border-radius: 10px;

padding-left: 80px;
padding-right: 50px;
padding-top: 50px;
padding-bottom:50px;
width: 200px;
box-shadow: 5px 7px 7px 5px rgba(2, 128, 144, 1);
}   

  .login input {
    font-family: sans-serif;
    display: block;
    border-radius: 5px;
    font-size: 16px;
    background: white;
    width: 100%;
    border: 0;
    padding: 10px 10px;
    margin: 15px -10px;
  }
  
  .login button {
    font-family: sans-serif;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    width: 80px;
    border: 0;
    padding: 10px 0;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-left: -5px;
    border-radius: 5px;
    background-color: rgba(244, 91, 105, 1);
    @include transition(background-color 300ms);
  }
    button:hover {
      background-color: darken(rgba(244, 91, 105, 1), 5%);
    }
    .left {
    height: 550px;
    background-color: white;
    border-block-style: block;
    border-radius: 50%;
    }

    /* Control the right side */
    .right {
    height: 550px;
    background-color: #ff6347;
    }
    .facts {
    /* overflow: hidden; */
    background-color: white;
    margin-top:60px;
    margin-left:120px;
    border-radius: 10px;
    /* position: absolute; */
    padding-left: 80px;
    padding-right: 50px;
    padding-top: 50px;
    padding-bottom:50px;
    width: 500px;
    box-shadow: 5px 7px 7px 5px rgba(2, 128, 144, 1);
    border-style: solid;
    border-left-color: #ff0000;   
    } 

    .facts li{
        padding:20px;
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
            <li><a href="#">Donate</a></li>
            <li id="register"><a href="register.php">Register</a></li>
        </ul>
    </nav>


    <div class="quote">
        <img src="imgs/login.jpg">
    </div>
    <div class="login-facts">
    <div class="left" style="float: left; width: 50%" >
    <form class="login" method="post" style="float:left; width:50%">
            <input type="text" name="username" placeholder="Username">
            <br><br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
            <button type="submit">Login</button>
            <br><br>

        </form>
    </div>

    <div class="right" style="float: right; width: 50%">
    <div class="facts">
    <ul>
        <h3>Key Features</h3>
        <li>Not every animal has red blood. Spiders, lobsters and snails have blue blood due to the presence of the protein haemocyanin which contains copper.</li>
        <li>The amount of blood in a pregnant woman's body will have increased by 50% by the 20th week of pregnancy.</li>
        <li>Research has shown that mosquitoes prefer blood type O. It would take 1,200,000 mosquitoes, each sucking once, to totally drain a human of blood.</li>
    </ul>    
    </div>
    </div>
    </div>
    <br>
</body>
<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color: white;">Group-19</a></p>
    </div>
</footer>
</html>