<?php

$con = mysqli_connect('127.0.0.1:3308', 'root', '','blood_donation');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
?>