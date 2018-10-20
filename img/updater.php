<?php
    include_once "../php/db_connection.php";
    $images=array_slice(scandir("."), 2);
    for($i = 0; $i < count($images); $i++){
        if(($r = $conn->query("SELECT * FROM images WHERE path = '".$conn->real_escape_string($images[$i])."'"))){
            if($r->num_rows == 0){
                if(!$conn->query("INSERT INTO images (path, tag) VALUES('".$conn->real_escape_string($images[$i])."',1)")){
                    echo $conn->error."<br>";
                    exit();
                }
            }
        }else{
            echo $conn->error."<br>";
        }
    }
    $conn->close();
    exit();
?>