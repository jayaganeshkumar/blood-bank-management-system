<?php
    session_start();
    $_SESSION;
    include('connection.php');
    include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Blood Bank</title>
    <link rel="stylesheet" href="navbar.css" type="text/css">
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
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
</body>
</html>