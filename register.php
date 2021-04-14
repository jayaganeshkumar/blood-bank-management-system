<?php

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $hash = hash("md5",$_POST['password']);

        // echo $username,$hash;

        if(!empty($username) && !empty($_POST['password']))
        {
            if($_POST['password']==$_POST['conf_pass']){
            $query = "insert into user (username,hash) values('$username','$hash') ";
            $result = mysqli_query($con,$query);

            if($result){
                echo "<script>alert('Registration successfull');
                window.location.href = 'login.php';</script>";
            }
        }
        else if($_POST['password'] != $_POST['conf_pass']){
            echo "<script>alert('enter passwords correctly');</script>";
        }
        
        
        else{
            echo "something went wrong, please try again";
            }
        }
    
    else{
        echo "Both passwords doesnot match, please re-register";
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
    <title>Register</title>

    <style>
        .quote img{width:90%;height:575px;align:center;padding-left:150px;}


        .form{
            width: 300px;

            margin: 100px auto;
  
        }
        input[type='text'],
        input[type='password'] {
            width: 200px;
            border-radius: 2px;
            border: 1px solid #CCC;
            padding: 10px;
            color: #333;
            font-size: 14px;
            margin-top: 10px;
            padding-top: 15px;
        }
        input[type='submit']{
            padding: 10px 25px 8px;
            color: #fff;
            background-color: #ff6437;
            text-shadow: rgba(0,0,0,0.24) 0 1px 0;
            font-size: 16px;
            box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
            border: 1px solid #0164a5;
            border-radius: 2px;
            margin-top: 10px;
            cursor:pointer;
        }
        input[type='submit']:hover {
            background-color: #024978;
        }
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
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            
            <li id="login"><a href="register.php">Login</a></li>
        </ul>
    </nav>
    <div class="quote">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNAiS5THMF6wBE33ZYkHTKk0D-yB0Q9T-5jA&usqp=CAU">
    </div>
    <div class="form">
    
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="conf_pass" placeholder="Re-enter Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
</body>
<footer>
    <div>
        <p>Copyright &copy; Group-19</p>
    </div>
</footer>
</html>