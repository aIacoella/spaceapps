<?php
    $reply = new stdClass();
    include_once "db_connection.php";

    if(!isset($_GET['tag'])){
        echo "Ciao";
    }else{
        /* Select all images which have the chosen tag */
        include_once "db_connection.php";
        $chosen_tag = $conn->real_escape_string($_GET['tag']);
        $query = "SELECT path, tags.tag_id FROM images INNER JOIN tags ON tags.name = '".$chosen_tag."' WHERE images.tag = tags.tag_id ";
        

        if(!($r=$conn->query($query))){
            echo "<p> Errore nel database</p>";
        }else{
            $i = 0;
            while(($row = $r->fetch_array(MYSQLI_ASSOC))){
                $reply->img{"$i"}=$row['path'];
               $i++;
            }
        $r->close();
        }
        $conn->close();
        echo json_encode($reply);
        exit();
    }
?>