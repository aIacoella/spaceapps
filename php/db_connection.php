<?php
    $conn = new mysqli("localhost", "root", "", "bridge");

    if($conn->connect_errno){
        /* Whatever the problem was the user will be redirected to the homepage*/
        echo "<span style=\"display:block;\">$conn->error</span><span>You'll be redirected to the homepage</span>";
        sleep(3000);
        header("Location:../index.php");
        die();
    }
?>