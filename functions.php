<?php

function check_login($con){
    if(isset($_SESSION['username']))
    {
        $name = $_SESSION['username'];
        $query = "SELECT * FROM user WHERE username='$name' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $userdata = mysqli_fetch_assoc($result);
            return $userdata;
        }
 
    }
    
//     //redirect to login
//     header("Location:index.php");
//     die;
}

?>