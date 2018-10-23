<?php
    /* This file contains server side code which will add poetry and quotes to an image */
    /*
    Parameters:

        POST:

            name: image's name, it references the record's value.
            content: the content which will be related to the image.
    */
    if(!isset($_POST['name']) || !isset($_POST['content'])){
        echo "<span style = \"display:block;\">Something went wrong with the request!</span>
                <span>You'll be redirected to the homepage</span>";
        sleep(3000);
        header('Location:../index.php');
        die();
    }else{
        include_once "db_connection.php";
        /*
        Escaping inputs.
        */
        $name = $conn->real_escape_string($_POST['name']);
        $content = $conn->real_escape_string($_POST['content']);
        $query = "INSERT INTO comments (content, img) SELECT '$content', img_id FROM images WHERE path = '$name'";
        if(!$conn->query($query)){
            echo $conn->error;
        }
        sleep(3000);
        header('Location:../index.php');
        die();
    }
?>