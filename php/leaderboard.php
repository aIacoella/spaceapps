<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>leaderboard</title>
</head>
<body>
<?php
    if(!isset($_POST['score'])){
        /* Invalid request */
    }else{
        include_once "db_connection.php";
        if(isset($_POST['name'])){
            $name = $conn->real_escape_string($_POST['name']);
            $score = $conn->real_escape_string($_POST['score']);
           $query = "INSERT INTO leaderboard (name, score) VALUES ('$name', $score)"; 
           if(!($r = $conn->query($query))){
               echo $conn->error;
               exit();
           }else{
               $query = "SELECT name, score FROM leaderboard WHERE 1 ORDER BY score DESC LIMIT 10";
               if(!($r = $conn->query($query))){
                    echo $conn->error;
                    exit();
                }else{
                    echo "<table>";
                    while(($row = $r->fetch_array(MYSQLI_ASSOC))){
                        echo "<tr><td>".$row['name']."</td><td>".$row['score']."</td></tr>";
                    }
                    echo "</table>";
                }
           }
        }else{
        $score = $conn->real_escape_string($_POST['score']);
        echo "<form method = \"post\" action = \"".basename(__FILE__)."\">
                <p>Well Played!</p>
                <p>Your score is $score</p>
                <input type = \"text\" name = \"name\">
                <input type = \"hidden\" name=\"score\" value = \"$score\"> 
                <input type = \"submit\">
            </form>";
        }
    }
?>
</body>
</html>
