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
        if(login($_POST["email"] , hash('sha256',$_POST["password"])))
        {
            $mail = $_POST["email"];
            $user = getUSer($mail)->fetch_assoc();
            $_SESSION["user"] = $user;
            $_SESSION["login"] = true;
            header("location: ../index.php");
            /*
            $_SESSION["idUser"] =$idUser = getIdUSer($mail);
            $_SESSION["nameUser"] =$nameUser = getNameUSer($idUser);
            #ritorna al index dopo aver fatto il login e mette login a true per cambiare la visualizzazione nel index nella navbar
            $_SESSION["login"] = true;
            $_SESSION["user"] = $idUser;
            header("location: ../index.php");

            */
        }
        else 
        {
            #aggiungere un visuallizazione migliore
            header("location: ../html/login.html");
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