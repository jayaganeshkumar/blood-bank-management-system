<?php
    session_start();
    $_SESSION;
    include("connection.php");
    include("functions.php");

    $cities_query = "select distinct city from blood_bank";
    $city_res = mysqli_query($con,$cities_query);
    $cities = mysqli_fetch_array($city_res);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $city_selected = $_POST['city'];
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">

    <style>
    .quote img{width:90%;height:550px;align:center;padding-left:150px;padding-top:5px}
    h3{
        text-align:center;
        padding:10px;
    }
    .form{
        text-align:center;
        padding:20px;
    }
    .city-select{
        padding-bottom:20px;
    }
    .city-select h3{
        padding-bottom:20px;
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
    .name-tab{
        width:250px !important;
    }
    .donor-table td {
        padding: 15px;
        text-align: left;
        border:1px solid black;
        text-align: center;
        width: 100px;
        height: 60px;
    }
    .donor-table th {
        padding: 15px;
        text-align: left;
        border:1px solid black;
        text-align: center;
        width: 100px;
        height: 60px;
        background-color: #f5f5f5
    }
    .donor-table tr:hover{
        background-color: #f5f5f5;
    }
    table{
        padding-bottom: 50px;
        
    }
    .center {
        margin-left: auto;
        margin-right: auto;
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
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="logout.php">Logout</a>
                <?php }else{echo "<script>alert('You are not logged in');
                window.location.href = 'login.php';</script>"; } ?></li>
        </ul>
    </nav>
    <div class="quote">
        <img src="imgs/request.jpg">
    </div>
    <h3>Select the city name below, to know the donor's available.</h3>

    <form method="post" class="form">
    <div class="city-select"><h3>City:</h3>
    <select name="city" id="city">
        <option disabled selected>-- Select City --</option>
        <?php
            $i = 0;
            while($i < mysqli_num_rows($city_res)){
                echo "<option value=$cities[$i]>$cities[$i]</option>";
                $i++;
            }
        ?>
    </select>
    </div>
    <div style="text-align:center">
                <input type="submit" name="submit" value="Submit">
            </div> 
    </form>
    
    <?php if(isset($city_selected)){?>
    <div class="donor-table">
    <table class="center">
    <tr>
    <th class="name-tab">Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Blood Group</th>
    <th>Mobile Number</th>
    </tr>
    <?php
    $tablequery = "select * from blood_bank where city='$city_selected'";
    $tableres = mysqli_query($con,$tablequery);
    
    while($tablearr = mysqli_fetch_assoc($tableres)){   //Creates a loop to loop through results
    echo "<tr><td>" .$tablearr['name']. "</td><td>" .$tablearr['age']. "</td><td>" .ucfirst($tablearr['gender']). "</td><td>" .ucfirst($tablearr['bgroup']). "</td><td>" .$tablearr['mobilenumber']. "</td></tr>";  //$row['index'] the index here is a field name
    }

    echo "</table>"; //Close the table in HTML
    ?>
    <?php } ?>
    </div>

    <div class="center">
        <h3>If you already took blood from anyone of the donors available in this website, then please click <a href="feedback.php" style="text-decoration: none">feedback</a> to provide your feedback</h3>

    </div>
     
</body>
<footer>
    <div>
        <p>Copyright &copy; <a href="admin_login.php" target="_blank" style="text-decoration: none;color: white;">Group-19</a></p>
    </div>
</footer>
</html>