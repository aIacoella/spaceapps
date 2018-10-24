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
        <a href="../index.php"><img src="../graphics/bridge.svg" alt="logobridge"></a>
        <img class="logotxt" src="../graphics/bridgeHD.svg" alt="logotxt">
        <div class="right-nav">
        <a href="./inspire.php">inspire</a>
        or
        <a href="./game.php">be inspired</a>
        </div>
    </div>
<?php
    /*
        The first time this file is going to be required it'll show a sign up form.
        When the user submit the form the leaderbord will be showed up.

        Parameters:

            At first:

                POST:

                    score: the score obtained by the user.

            Later:

                    name: name the user has chose.
    */
    if(!isset($_POST['score'])){
        echo "<span style = \"display:block;\">Something went wrong with the request!</span>
        <span>You'll be redirected to the homepage</span>";
        sleep(3000);
        header('Location:../index.php');
    }else{
        include_once "db_connection.php";
        if(isset($_POST['name'])){
            $session = $_COOKIE['game_session'];
            setcookie('game_session', "", 0, '/');
            setcookie('game_image', "", 0, '/');
            unlink($session);
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
                    echo "<table class='leaderboard'>";
                    echo "  <tr>
                    <th>Username</th>
                    <th>Score</th>
                  </tr>";
                    while(($row = $r->fetch_array(MYSQLI_ASSOC))){
                        echo "<tr><td>".htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8')."</td><td>".htmlspecialchars($row['score'], ENT_QUOTES, 'UTF-8')."</td></tr>";
                    }
                    echo "</table>";
                }
           }
        }else{
        /* If there's no name a form is printed */
        $score = htmlspecialchars($conn->real_escape_string($_POST['score']), ENT_QUOTES, 'UTF-8');
        echo "<form method = \"post\" action = \"".basename(__FILE__)."\">
                <h2 class='wellPlayed'>Well Played!</h2>
                <h4 class='wellPlayed'>Your score is $score</h4>
                <div class='wpdiv'>
                    <input type = \"text\" name = \"name\"  placeholder='Username' >
                    <input type = \"submit\" value='Send'>
                </div>
                <input type = \"hidden\"name=\"score\" value = \"$score\" > 
            </form>";
        }
    }
?>
</body>
</html>
