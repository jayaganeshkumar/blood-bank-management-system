<?php
    session_start();
    unset($_SESSION['username']);
    echo "<script>alert('Logged out successfull');
    window.location.href = 'index.php';</script>";
?>