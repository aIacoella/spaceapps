<?php
    $conn = new mysqli("localhost", "root", "bridge", "bridge");

    if($conn->connect_errno){
        /*
        print error message
        */
        exit();
    }
?>