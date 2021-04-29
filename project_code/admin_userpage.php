<?php
    session_start();
    $_SESSION;
    include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        width:150px;
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
        width: 70px;
        height: 50px;
    }
    .donor-table th {
        padding: 15px;
        text-align: left;
        border:1px solid black;
        text-align: center;
        width: 70px;
        height: 5   0px;
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
    </style>
</head>
<body>
    
<form method="post">
        <input type="submit" name="button1"
                class="button" value="See Feedbacks"/>
        <?php

            if(array_key_exists('button1', $_POST)){?>
                    <div class="donor-table">
                    <table class="center">
                    <tr>
                    <th>S.No</th>
                    <th class="name-tab">Name</th>
                    <th style="width:250px !important">Donor Name</th>
                    <th>Donor Mobile Number</th>
                    <th>Donor Blood Group</th>
                    <th>Feedback</th>
                    <th>Happy or not</th>
                    </tr>
                    <?php
                    $tablequery = "select * from feedback";
                    $tableres = mysqli_query($con,$tablequery);
                    $i=1;
                    while($tablearr = mysqli_fetch_assoc($tableres)){   //Creates a loop to loop through results
                    echo "<tr><td>" .$i. "</td><td>" .$tablearr['name']. "</td><td>" .$tablearr['dname']. "</td><td>" .$tablearr['mobiled']. "</td><td>" .ucfirst($tablearr['dbgroup']). "</td><td>" .$tablearr['feedback']. "</td><td>" .$tablearr['happyp']. "</td></tr>";  //$row['index'] the index here is a field name
                    $i++;
                }
                
                    echo "</table>"; //Close the table in HTML
                    ?>
                    <?php } ?>
                    </div>

        <input type="submit" name="button2"
                class="button" value="Update database"/>
                <?php
                if(array_key_exists('button2', $_POST)){
                    echo "<script>window.open('http://localhost/phpmyadmin/index.php','_blank').focus();</script>";
                }?>
    </form>
</body>
</html>