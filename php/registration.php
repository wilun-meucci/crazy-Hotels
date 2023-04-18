<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<?php
    function checkPsw($psw,$pswConferma)
    {
        if($psw ==$pswConferma)
            return true;
        else 
            return false;
    }
    #controlla se la mail è inizializzata
    if(isset($_POST["mail"]))
    {
        #avvia la sessione ed poi importa databaseQuery
        session_start();
        require("../db/databaseQuery.php");

        #controlla se il campo mail esiste gia nel db 
        if(!checkExistUser($_POST["mail"]))
        {
            $nome = $_POST["name"];
            $cognome = $_POST["surname"];
            $compleanno = $_POST["birthday"];
            $gender = $_POST["gender"];
            $mail = $_POST["mail"];
            $telefono = $_POST["phoneNumber"];
            $psw = $_POST["psw"];
            $pswConferma = $_POST["psw1"];
            if(checkPsw($psw,$pswConferma))
            {
                $userId = getNumId()+1;
                require("../db/databaseInsert.php");
                if(registration($userId, $nome, $cognome, $mail, hash('sha256',$psw), $gender,$compleanno,$telefono))
                {
                    echo "gg";
                    $_POST["email"] = $mail;
                    header("location: ../html/login.html");
                }
                else 
                    echo "non andata registrazione";
            }
            else 
            {
                echo "password non coincidono";
            }
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
        echo "dio";
    }
?>
<body>
    
</body>
</html>