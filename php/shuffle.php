<?php
    /*

        This file must be called via AJAX.

        It returns the data needed to run the game.
    */
    if(!isset($_SESSION['game_session'])){
        include_once "db_connection.php";
        session_start();
        $query = "SELECT img, images.path, content FROM comments INNER JOIN images ON img_id = img ORDER BY rand() limit 1";
        if(!($r=$conn->query($query))){
            echo $conn->close();
            $conn->close();
            die();
        }
        $row = $r->fetch_array(MYSQLI_ASSOC);
        $session = array_merge($session, $row['path']);
        $_SESSION['game_session'] = $session;
        $reply = array();
        $reply[0] = $row['path'];
        $reply[1] = htmlspecialchars($row['content'], ENT_COMPAT, 'UTF-8');
        $r->close();
        $query = "SELECT content FROM comments WHERE img !=". $row['img']." ORDER BY rand() limit 3";
        if(!($r = $conn->query($query))){
            echo $conn->error;
            $conn->close();
            die();
        }
        $i = 2;
        while(($row = $r->fetch_array(MYSQLI_ASSOC))){
            $reply[$i] = htmlspecialchars($row['content'], ENT_COMPAT, 'UTF-8');
            $i++;
        }
        $r->close();
        $conn->close();
        echo json_encode($reply);
        die();
    }else if(isset($_SESSION['game_session'])){
        include_once "db_connection.php";
        /* Session is an array */
        $session = array();
        $session = $_SESSION['game_session'];
        $query = "SELECT img, images.path, content FROM comments INNER JOIN images ON img_id = img WHERE images.path NOT IN (".get_images($session).") ORDER BY rand() limit 1";
        if(!($r=$conn->query($query))){
            echo $conn->close();
            $conn->close();
            die();
        }
        if($r->num_rows === 0){
            echo "<span style=\"display:block;\">You won.</span><span> If you want more poetry, just write it by yourself!</span>";
            /* Session is aborted here: remove it from leaderboard.php*/
            session_abort();
            $r->close();
            $conn->close();
            die();
        }
        $reply = array();
        $row = $r->fetch_array(MYSQLI_ASSOC);
        $session = array_merge($session, $row['path']);
        $_SESSION['game_session'] = $session;
        $reply[0] = $row['path'];
        $reply[1] = htmlspecialchars($row['content'], ENT_COMPAT, 'UTF-8');
        $r->close();
        $query = "SELECT content FROM comments WHERE img !=". $row['img']." ORDER BY rand() limit 3";
        if(!($r = $conn->query($query))){
            echo $conn->error;
            $conn->close();
            die();
        }
        $i = 2;
        while(($row = $r->fetch_array(MYSQLI_ASSOC))){
            $reply[$i] = htmlspecialchars($row['content'], ENT_COMPAT, 'UTF-8');
            $i++;
        }
        $r->close();
        $conn->close();
        echo json_encode($reply);
        die();
    }

    function get_images($session = NULL){
        if($session == NULL || !is_array($session))
            return false;
        $images_a = "";
        for($i = 0; $i < count($session); $i++){
            $images_a .= $session[$i].',';
        }
        $images_a[$i-1] = "";
        return $images_a;
    }
?>