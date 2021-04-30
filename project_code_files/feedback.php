<?php
   session_start();
   $_SESSION;
   include('connection.php');
   include('functions.php');
   $userdata = check_login($con);
   $id = $userdata['id'];
   $uname = $_SESSION['username'];

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $pname = $_POST['name'];
        $dname = $_POST['dname'];
        $dbgroups = $_POST['bgroupd'];
        $mobilenumd = $_POST['mobilenumd'];
        $happyp = $_POST['happyp'];
        $feedback = $_POST['feedback'];

        $insert_que = "insert into feedback (name,dname,dbgroup,mobiled,happyp,feedback) values ('$pname','$dname','$dbgroups','$mobilenumd','$happyp','$feedback')";
        $insert_res = mysqli_query($con,$insert_que);

        if($insert_res){
            echo "<script>alert('Thank you for feedback!!');
            window.location.href = 'user_page.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">

    <style>
     * {
        box-sizing: border-box;
    }
    .quote img{width:85%;height:525px;align:center;padding-left:150px;}
    .y-feedback {
    /* overflow: hidden; */
        background-color: white;
        margin-top:30px;
        /* margin-left:120px; */
        border-radius: 10px;
        /* position: absolute; */
        padding-left: 80px;
        padding-right: 50px;
        padding-top: 30px;
        padding-bottom:20px;
        width: 80%;
        border-style: solid;
        border-left-color: #ff0000;
        font-size:18px;
        margin-bottom:20px;
    } 
    .center {
        margin-left: auto;
        margin-right: auto;
    }
    .y-feedback li{
        padding:20px;
    }
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
            <li><a href="aboutus.php">About</a></li>
            <li><a href="donate.php">Donate</a></li>
            <li><a href="request.php">Request</a></li>
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="logout.php">Logout</a>
                <?php }else{echo "<script>alert('You are not logged in');
                window.location.href = 'login.php';</script>"; } ?></li>
        </ul>
    </nav>

    <div class="quote">
        <img src="imgs/amazon_feedback.jpg">
    </div>

    <div class="y-feedback center" style="margin-left: 50px">
    <p>Why you should give this feedback?</p>
    <ul>
        <li>To improve the platform.</li>
        <li>To update the database.</li>
        <li>Please provide the name of donor and his mobile number to remove his name from database as he will not be able to donate for next 6 months.</li>
        
    </ul>
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
            <label for="dname">Donor Name</label></div>
            <div class="col-75">
            <input type="text" name="dname" id="dname" placeholder = "Donor's Name" required">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
            <label for="bgroupd">Blood Group of donor</label></div>
            <div class="col-75">
            <select name="bgroupd" id="bgroupd" requrired>
                <option value="" disabled selected>Choose blood group of Donor</option>
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
            <label for="mobilenumd">Mobile Number of Donor</label></div>
            <div class="col-75">
            <input type="text" name="mobilenumd" id="mobilenumd" placeholder="Donor's Mobile Number" required></div></div>

            <div class="row">
            <div class="col-25">
            <label for="happyp">Are you happy with platform?</label></div>
            <div class="col-75" style="padding-top:15px;padding-bottom:10px">
            <input type="radio" name="happyp" value="yes">  Yes
            <input type="radio" name="happyp" value="no">  No
            </div></div>

            <div class="row">
            <div class="col-25">
            <label for="feedback">Feedback for platform</label></div>
            <div class="col-75">
            <textarea id="feedback" name="feedback" placeholder="Your feedback" style="height:100px"></textarea></div></div>

            <div style="text-align:center">
                <input type="submit" name="submit" value="Submit">
            </div> 
        </form>
    </div>
</body>
<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color: white;">Group-19</a></p>
    </div>
</footer>
</html>