<?php
    $conn = new mysqli("localhost", "bridge", "bridge", "bridge");

    if($conn->connect_errno){
        /*
        print error message
        */
        exit();
    }
?>