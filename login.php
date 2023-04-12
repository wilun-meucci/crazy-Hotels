<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
    
    
    
    

    if(isset($_POST["email"]))
    {
        session_start();
        #require ( "connectDB.php");
        require ( "databaseQuery.php");
        #$connessione= connectDB();
        echo "ciao <br>";
        if(checkExistUser($_POST["email"] , hash('sha256',$_POST["password"])))
        {
            $mail = $_POST["email"];
            $_SESSION["idUser"] =$idUser = getIdUSer($mail);
            $_SESSION["nameUser"] =$nameUser = getNameUSer($idUser);
            $_SESSION["login"] = true;
            header("location: index.php");
            
        }
        else echo "non funge";
        
    } 
    else 
    {
        echo "sei stupido";
        #header("location: login.html");
    }
?>
<body>
    
</body>
</html>