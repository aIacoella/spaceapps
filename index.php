<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bridge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/selectdiv.js"></script>
    
</head>
<body>
    <div class="header-index" >
        <div style="margin: auto; width: 100%;">
        <img src="./graphics/bridge.svg" alt="icon">
        <img style="display:block; margin:auto;" src="./graphics/bridgeHD.svg" alt="icon">
        </div>
    </div>
    <div class="selectionWrapper">
        <a href="./php/inspire.php" id="inspire" class="userDiv inspireDiv" onmouseenter="changeHoverState(0)">
            <h1 class="classTitle">Inspire</h1>
        </a>
        <a href="php/game.php" id="beinspired" class="userDiv beinspiredDiv" onmouseenter="changeHoverState(1)">
            <h1 class="classTitle">Be Inspired</h1>
        </a>
    </div>
</body>
</html>