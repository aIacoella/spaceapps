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
           $query = "INSERT INTO leaderboard (name, score) VALUES ()"; 
        }else{
        $score = $conn->real_escape_string($_POST['score']);
        echo "<form method = \"post\" action = \"".__FILE__."\">
                <p>Well Played!</p>
                <p>Your score is $score</p>
                <input type = \"text\" name = \"name\">
                <input type = \"submit\">
            </form>";
        }
    }
?>
</body>
</html>
