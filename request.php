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
        .quote img{width:90%;height:550px;align:center;padding-left:150px;}
        h3{
            text-align:center;
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
    .donor-table td {
        padding: 15px;
        text-align: left;
        border:1px solid black;
        justify-content: center;
    }
    .donor-table th {
        padding: 15px;
        text-align: left;
        border:1px solid black;
        justify-content: center;
    }
    .donor-table tr:hover{
        background-color: #f5f5f5;
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
            <li><a href="donate.php">Donate</a></li>
            <li id="login"><?php
            if(isset($_SESSION['username'])){?>
                <a href="logout.php">Logout</a>
                <?php }else{echo "<script>alert('You are not logged in');
                window.location.href = 'login.php';</script>"; } ?></li>
        </ul>
    </nav>
    <div class="quote">
        <img src="https://i2.wp.com/goodmorninglovequote.com/wp-content/uploads/2020/10/Blood-Donate-quotes-Is-A-Great-Act-Of-Kindness-4.jpg?resize=1024%2C576&ssl=1">
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

    <div class="donor-table">
    <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Blood Group</th>
    <th>Mobile Number</th>
    </tr>
    <?php
    $tablequery = "select * from blood_bank where city='$city_selected'";
    $tableres = mysqli_query($con,$tablequery);
    
    $i = 0;
    echo "<table>"; // start a table tag in the HTML
    while($tablearr = mysqli_fetch_assoc($tableres)){   //Creates a loop to loop through results
    echo "<tr><td>" .$tablearr['name']. "</td><td>" .$tablearr['age']. "</td><td>" .$tablearr['gender']. "</td><td>" .$tablearr['bgroup']. "</td><td>" .$tablearr['mobilenumber']. "</td></tr>";  //$row['index'] the index here is a field name
    }

    echo "</table>"; //Close the table in HTML
    ?>
    </div>
     
</body>
</html>