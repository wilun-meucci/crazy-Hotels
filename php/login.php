<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
    #controlla se la mail è inizializzata
    if(isset($_POST["email"]))
    {
        #avvia la sessione ed poi importa databaseQuery
        session_start();
        require("../db/databaseQuery.php");

        #controlla se il campo mail e pass sono giusti hashando la pass prima
        if(checkExistUser($_POST["email"] , hash('sha256',$_POST["password"])))
        {
            $mail = $_POST["email"];
            $_SESSION["idUser"] =$idUser = getIdUSer($mail);
            $_SESSION["nameUser"] =$nameUser = getNameUSer($idUser);
            #ritorna al index dopo aver fatto il login e mette login a true per cambiare la visualizzazione nel index nella navbar
            $_SESSION["login"] = true;
            header("location: ../index.php");
        }
        else 
        {
            #aggiungere un visuallizazione migliore
            echo "errore mail oppure password";
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