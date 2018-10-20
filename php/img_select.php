<?php

    if(!isset($_POST['tag'])){
        echo "";
    }else{
        /* Select all images which have the chosen tag */
        include_once "db_connection.php";
        $chosen_tag = $conn->real_escape_string($_POST['tag']);
        $query = "SELECT path FROM images INNER JOIN tags ON tags.tag_id = $chosen_tag WHERE tags.name =".$chosen_tag;
        

        if(!($r=$conn->query($query))){
            echo "<p> Errore nel database</p>";
        }else{
            $i = 0;
            $reply;
            while(($row = $r->fetch_array(MYSQLI_ASSOC))){
               $reply->path.{"$i"} = $row['path'];
            }
        }
        $r->close();
        $mysqli->close();
        echo json_encode($reply);
        exit();
    }
?>