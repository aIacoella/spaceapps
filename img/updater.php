<?php
    include_once "../php/db_connection.php";
    $images=array_slice(scandir("."), 2);
    for($i = 0; $i < count($images); $i++){
        if(($conn->query("SELECT * FROM images WHERE path = $images[$i]"))->num_rows == 0){
            if(!$conn->query("INSERT INTO images (path) VALUES(".$conn->real_escape_string($images[$i]).")")){
                exit();
            }
        }
    }
    $conn->close();
    exit();
?>