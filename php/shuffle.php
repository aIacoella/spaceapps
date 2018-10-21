<?php
    /*
        This file must be called via AJAX
    */
    include_once "db_connection.php";
     /* Image and right comment */
    $query = "SELECT comment_id, images.path, content FROM comments INNER JOIN images ON img_id = comment_id ORDER BY rand() limit 1";

    if(!($r = $conn->query($query))){
        /*
        error
        */
    }else{
        $row_i = $r->fetch_array(MYSQLI_ASSOC);
        $reply->path = $row_i["path"];
        $reply->right = $row_i["content"];
        $query = "SELECT content FROM comments WHERE comment_id !=". $row_i['comment_id']." ORDER BY random() limit 3";
        $r->close();
        if(!($r = $conn->query($query))){
            /* Error */
            exit();
        }
        $i = 0;
        while(($row = $r->fetch_array(MYSQLI_ASSOC))){
           $reply->{"$i"} = $row['content'];
           $i++;
        }
        $r->close();
        echo json_encode($reply);
        $conn->close();
        exit();
    }
?>