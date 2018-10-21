<?php
    if(!isset($_POST['name']) || !isset($_POST['content'])){
        /*
        Errore richiesta
        */
    }else{
        include_once "db_connection.php";
        $name = $conn->real_escape_string($_POST['name']);
        $content = $conn->real_escape_string($_POST['content']);
        $query = "INSERT INTO comments (content, img) SELECT '$content', img_id FROM images WHERE path = '$name'";
        echo $conn->error;
        $conn->query($query);
        header('Location:../index.php');
        die();
    }
?>