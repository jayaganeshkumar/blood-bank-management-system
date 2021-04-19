<?php
    session_start();
    $_SESSION;
    include('connection.php');
    include('functions.php');
    $userdata = check_login($con);
    $id = $userdata['id'];
    $uname = $_SESSION['username'];
    $que = "select * FROM blood_bank WHERE username='$uname' limit 1";
    
    $res = mysqli_query($con, $que);
    if($res && mysqli_num_rows($res) > 0){
        echo "<script>alert('You are already registered as donor!
        redirecting to user page...');
        window.location.href='user_page.php';</script>";
    }
    else{

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $mobilenum = $_POST['mobilenum'];
        $address = $_POST['address'];
        $bgroup = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['bgroup'])) {
              $bgroup = $_POST['bgroup'];
            }
          }
        $dh = $_POST['disease_history'];
        $city = $_POST['city'];

        $query = "insert into blood_bank (id,username,name,fname,age,gender,mobilenumber,address,city,bgroup,dh) values('$id','$uname','$name','$fname','$age','$gender','$mobilenum','$address','$city','$bgroup','$dh') ";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<script>alert('You are added as donor!!');
            window.location.href = 'user_page.php';</script>";
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
    <title>Donate - Blood Bank</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">
    <style>
    * {
        box-sizing: border-box;
    }
    .quote img{width:90%;height:575px;align:center;padding-left:150px;padding-bottom:50px}
    input[type=text], select, textarea {
        width: 70%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        margin-left: 40px;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        width:80px;
        padding: 20px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: center;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin-left: 20px;
        margin-right: 100px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

        /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="request.php">Request</a></li>
                <li id="login"><?php
                if(isset($_SESSION['username'])){?>
                    <a href="logout.php">Logout</a>
                    <?php }else{echo "<script>alert('You are not logged in');
                    window.location.href = 'login.php';</script>"; } ?></li>
            </ul>
        </nav>
        <div class="quote">
        <img src="https://www.news-medical.net/image.axd?picture=2020%2F10%2Fshutterstock_603317201-1.jpg">
        </div>
    <div class="form-section container">
        <form method="post">
            <div class="row">
            <div class="col-25">
            <label for="name">Name</label></div>
            <div class="col-75">
            <input type="text" name="name" id="name" placeholder = "Your's Name" required">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
            <label for="fname">Father's Name</label></div>
            <div class="col-75">
            <input type="text" name="fname" id="fname" placeholder="Your's Father's Name" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
            <label for="bgroup">Blood Group</label></div>
            <div class="col-75">
            <select name="bgroup" id="bgroup" requrired>
                <option value="" disabled selected>Choose blood group</option>
                <option value="o+">O +ve</option>
                <option value="o-">O -ve</option>
                <option value="ab+">AB +ve</option>
                <option value="ab-">AB -ve</option>
                <option value="a+">A +ve</option>
                <option value="a-">A -ve</option>
                <option value="b+">B +ve</option>
                <option value="b-">B -ve</option>
            </select>
            </div>
            </div>
            
            <div class="row">
            <div class="col-25">
            <label for="age">Age</label></div>
            <div class="col-75">
            <input type="text" name="age" id="age" placeholder="Your Age" required>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
            <label for="gender">Gender</label></div>
            <div class="col-75" style="padding-top:15px;padding-bottom:10px">
            <input type="radio" name="gender" value="male">  Male<br>
            <input type="radio" name="gender" value="female">  Female
            </div>
            </div>

            <div class="row">
            <div class="col-25">
            <label for="mobilenum">Mobile Number</label></div>
            <div class="col-75">
            <input type="text" name="mobilenum" id="mobilenum" placeholder="Your Mobile Number" required></div></div>

            <div class="row">
            <div class="col-25">
            <label for="city">City</label></div>
            <div class="col-75">
            <input type="text" name="city" id="city" placeholder="Your City" reqiured></div></div>

            <div class="row">
            <div class="col-25">
            <label for="address">Address</label></div>
            <div class="col-75">
            <textarea id="address" name="address" placeholder="Your address" style="height:100px"></textarea></div></div>

            <div class="row">
            <div class="col-25">
            <label for="disease_history">Are you infected with any powerful disease recently (in a month period)?</label></div>
            <div class="col-75" style="padding-top:15px;padding-bottom:10px">
            <input type="radio" name="disease_history" value="yes">  Yes
            <input type="radio" name="disease_history" value="no">  No
            </div></div>
           
            <div style="text-align:center">
                <input type="submit" name="submit" value="Submit">
            </div> 
        </form>
    </div>
</body>
<footer>
    <div>
        <p>Copyright &copy; Group-19</p>
    </div>
</footer>
</html>