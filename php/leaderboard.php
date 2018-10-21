<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><title>leaderboard</title>
</head>
<body>
<div class="header">
    <h1>Bridge</h1>
</div>
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
                <h2 class='wellPlayed'>Well Played!</h2>
                <h4 class='wellPlayed'>Your score is $score</h4>
                <input type = \"text\" name = \"name\"  placeholder='Username' >
                <input type = \"hidden\"name=\"score\" value = \"$score\" > 
                <input type = \"submit\" value='Send'>
            </form>";
        }
    }
?>
</body>
</html>
