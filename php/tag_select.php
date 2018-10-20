<?php
    /* Return tags */
    include_once "db_connection.php";
    $query = "SELECT name FROM tags WHERE 1";
    if(!($r = $conn->query($query))){
        echo "Errore database!";
        exit();
    }
    $reply;
    $i = 0;
    while(($row = $r->fetch_array(MYSQLI_ASSOC))){
        $reply->{"$i"} = $row["name"];
        $i++;
    }
    $r->close();
    $conn->close();
    echo json_encode($reply);
    exit();
?>