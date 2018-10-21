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
</head>
<body>
<div class="header">
        <h1>Bridge</h1>
    </div>
    <div class="current-score-div">
        <div id="current-score">
            1
        </div>
    </div>

    <img class="main-img" src=<?php 
        if(!isset($_GET['name'])) echo "errore";
        else echo "'../img/" . $_GET['name'] . "'";
        ?> alt="boh fra">

    <div class="answers-div">
        <div class="answer-block">
            <div class="num-block">1</div>
        </div>
    </div>
    
</body>
</html>