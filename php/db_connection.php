<?php
    $conn = new mysqli("localhost", "root", "", "bridge");

    if($conn->connect_errno){
        /*
        print error message
        */
        exit();
    }
?>