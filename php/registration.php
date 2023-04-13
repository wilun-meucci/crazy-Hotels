<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<?php
    #controlla se la mail è inizializzata
    if(isset($_POST["email"]))
    {
        #avvia la sessione ed poi importa databaseQuery
        session_start();
        require("../db/databaseQuery.php");

        #controlla se il campo mail esiste gia nel db 
        if(!checkExistUser($_POST["email"]))
        {
            $nome = $_post["name"];
            $cognome = $_post["surname"];
            $mail = $_POST["email"];
            $psw = $_post["psw"];
            
        }
        else 
        {
            #aggiungere un visuallizazione migliore
            echo "mail esiste gia";
        }
        
    } 
    else 
    {
        echo "non hai messo mail";
    }
?>
<body>
    
</body>
</html>