<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/game.js"></script>
</head>
<body>
<div class="header">
        <a style="margin: 0;"href="../index.php">
        <img id="logo" src = "../img/bridge.svg">
        </a>
        <h1>Bridge</h1>
        <a class="inspire" href="./inspire.php">inspire</a>
        <span>or</span>
        <a href = "./game.php">be inspired</a>
    </div>
    <div class="current-score-div">
        <div id="current-score">
            1
        </div>
    </div>
        <img class="main-img" id="mainImg" src="" alt="img">
    <form id="gameForm" method="post" action= "leaderboard.php">
    <div class="answers-div">
        <div class="answer-block" onClick="answer(1)">
            <div class="num-block">1</div>
            <p id="answer1"></p>
        </div>
        <div class="answer-block" onClick="answer(2)">
            <div class="num-block">2</div>
            <p id="answer2"></p>
        </div>
        <div class="answer-block" onClick="answer(3)">
            <div class="num-block">3</div>
            <p id="answer3"></p>
        </div>
        <div class="answer-block" onClick="answer(4)">
            <div class="num-block">4</div>
            <p id="answer4"></p>
        </div>
        <input id = "scoreInput" name = "score" type="hidden" value="">
    </div>
    
</body>
</html>