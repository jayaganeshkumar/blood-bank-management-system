<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        // echo $username,$hash;

        if(!empty($username) && !empty($_POST['pass']))
        {
            $query = "select * from admin where username='$username' limit 1";
            $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result) == 0)
            {
                echo "retry login";
            }
            else
            {
                $user_data = mysqli_fetch_assoc($result);
                if($pass == $user_data['password'])
                {
                    $_SESSION['username'] = $user_data['username'];
                    // echo 'Login Successful', $_SESSION['username'];
                    // // echo "<script>alert('Login Successful');</script>";
                    // $userdata = check_login($con);
                    // echo $userdata;
                    header("Location:admin_userpage.php");
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
    <title>Admin - Login</title>
    <style>
   
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


    <div class="left" style="float: left; width: 50%" >
    <form class="login" method="post" style="float:left; width:50%">
            <input type="text" name="username" placeholder="Username">
            <br><br>
            <input type="pass" name="pass" placeholder="Password">
            <br><br>
            <button type="submit">Login</button>
            <br><br>

        </form>
    </div>

    
</body>
<footer>
    <div>
        <p>Copyright &copy; Group-19</p>
    </div>
</footer>
</html>