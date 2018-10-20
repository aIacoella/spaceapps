<?php
    /*
    CREATE TABLE tags (tag_id INT NOT NULL AUTO_INCREMENT, name TINYTEXT NOT NULL)
    CREATE TABLE images (image_id INT NOT NULL AUTO_INCREMENT, path TINYTEXT NOT NULL, tag INT NOT NULL, date DEFAULT CURTIME(), PRIMARY KEY  (img_id), FOREIGN KEY  (tag) REFERENCES (tags.tag_id))
    CREATE TABLE comments (comment_id INT NOT NULL AUTO INCREMENT, img INT NOT NULL,content tinytext NOT NULL, date DEFAULT CURTIME(), PRIMARY KEY  (comment_id), FOREIGN KEY  (img) REFERENCES (images.img_id))
    */

    if(!isset($_POST['tag'])){
        /*
        Error 
        */
    }else{
        /* Select all images which have the chosen tag */
        include_once "db_connection.php";
        $query = "SELECT tags.name, path, date FROM images INNER JOIN tags ON tags.tag_id = tag";
        $chosen_tag = $mysqli->real_escape_string($_POST['tag']);

        if(!($r=$mysqli->query($query))){
            echo "<p> Errore nel database</p>";
        }else{
            while(($row = $r->fetch_array(MYSQLI_ASSOC))){
                /* prints images */
            }
        }

        $mysqli->close();
    }
?>