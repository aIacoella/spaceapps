<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <title>Inspire Add</title>
</head>
<body>
    <div class="header">
        <h1>Bridge</h1>
    </div>
    <form action="./add.php" method="post">
        <img src=<?php 
        if(!isset($_GET['name'])) echo "errore";
        else echo "'../img/" . $_GET['name'] . "'";
        ?> alt="boh fra">
        <input type="hidden" name="name" value=<?php 
        if(!isset($_GET['name'])) echo "errore";
        else echo $_GET['name'];
        ?>>
        <input type="text" name="content">
        <input type="submit">
    </form>
</body>
</html>