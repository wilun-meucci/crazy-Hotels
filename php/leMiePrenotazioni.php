<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prenotazioni </title>
</head>

<?php

    if(checkExistUser($_SESSION["user"]))
    {
        echo "gg";
    }
    else 
    {
        header("location: ../index.php");
    }
?>
<body>

    ciao
</body>
</html>