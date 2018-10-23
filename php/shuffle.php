<?php
    /*
        This file must be called via AJAX.

        It returns the data needed to run the game.
    */
    if(!isset($_COOKIE['game_image']) && !isset($_COOKIE['game_session'])){
        include_once "db_connection.php";
        $query = "SELECT comment_id, images.path, content FROM comments INNER JOIN images ON img_id = img ORDER BY rand() limit 1";
        if(!($r=$conn->query($query))){
            echo $conn->close();
            $r->close();
            $conn->close();
            die();
        }
        /* It's the first call from the client */
        mt_srand(time());
        $session = mt_rand(1000, 1000000);
        if(($fd = fopen($session, 'w')) === FALSE){
            echo "<span style = \"display:block\">Internal error</span>";
            $r->close();
            $conn->close();
            die();
        }
        $row = $r->fetch_array(MYSQLI_ASSOC);
        setcookie('game_session', $session, 0, '/');
        setcookie('game_image', $row['images.path']);
        $reply = array();
        $reply[0] = $row['images.path'];
        $reply[1] = $row['content'];
        $r->close();
        $query = "SELECT content FROM comments WHERE comment_id !=". $row['comment_id']." ORDER BY rand() limit 3";
        if(!($r = $conn->query($query))){
            echo $conn->error;
            $r->close();
            $conn->close();
            die();
        }
        $i = 2;
        while(($row = $r->fetch_array(MYSQLI_ASSOC))){
            $reply[$i] = $row['content'];
            $i++;
        }
        $r->close();
        $conn->close();
        fclose($session);
        echo json_encode($reply);
        die();
    }else if(isset($_COOKIE['game_image']) && isset($_COOKIE['game_session'])){
        include_once "db_connection.php";
        $session = $_COOKIE['game_session'];
        $image = $_COOKIE['game_image'];
        if(($fd = fopen($session, 'r+')) === FALSE){
            echo "Internal error";
            die();
        }
        if(fwrite($fd, $image.'\n') == 0){
            echo "Internal error";
            $conn->close();
            fclose($fd);
            die();
        }
        $query = "SELECT comment_id, images.path, content FROM comments INNER JOIN images ON img_id = img WHERE images.path NOT IN (".get_images($fd).") ORDER BY rand() limit 1";
        if(!($r = $conn->query($query))){
            echo $conn->error;
            $r->close();
            fclose($fd);
            $conn->close();
            die();
        }
        $reply = array();
        $row = $r->fetch_array(MYSQLI_ASSOC);
        setcookie('game_image', $row['images.path'], 0, '/');
        $reply[0] = $row['images.path'];
        $reply[1] = $row['content'];
        $r->close();
        $query = "SELECT content FROM comments WHERE comment_id !=". $row['comment_id']." ORDER BY rand() limit 3";
        if(!($r = $conn->query($query))){
            echo $conn->error;
            $conn->close();
            fclose($fd);
        }
        $i = 2;
        while(($row = $r->fetch_array(MYSQLI_ASSOC))){
            $reply[$i] = $row['content'];
            $i++;
        }
        fclose($fd);
        $r->close();
        $conn->close();
        echo json_encode($reply);
        die();
    }else{
        echo "Security: Something went wrong!";
        die();
    }

    function get_images($session_file = NULL){
        if($session_file == NULL)
            return false;
        $images_a = "";
        while(fgets($session_file, 4096, $read) != ){
            $images_a = join(',', $read);
        }
        return $image_a;
    }
?>