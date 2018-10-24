<?php
    /*
        It returns images according to tags selection.

        Parameters:

            GET:
            
                tag: tag chosen by the user.
    */
    $reply = array();
    include_once "db_connection.php";

    if(!isset($_GET['tag'])){
        echo "<span style =\"display:block;\">Something went wrong with the request!</span>
            <span>You'll be redirected to the homepage.</span>";
        header('Location:../index.php');
        die();
    }else{
        /* Select all images which have the chosen tag */
        include_once "db_connection.php";
        /*
        Escaping inputs.
        */
        $chosen_tag = $conn->real_escape_string($_GET['tag']);

        /* I should update tags db structure */
        $query = "SELECT path, tags.tag_id FROM images INNER JOIN tags ON tags.name = '".$chosen_tag."' WHERE images.tag = tags.tag_id ";
        

        if(!($r=$conn->query($query))){
            echo "<span> $conn->error </span>";
        }else{
            $i = 0;
            while(($row = $r->fetch_array(MYSQLI_ASSOC))){
                /* Encoding return values in JSON */
                $reply[$i]=$row['path'];
               $i++;
            }
        $r->close();
        }
        $conn->close();
        echo json_encode($reply);
        exit();
    }
?>