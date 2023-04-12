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
        if(checkExistUser($_POST["email"] , $_POST["password"]))
        {
            echo "gg <br>";
            $_SESSION["idUser"] =$idUser = getIdUSer($_POST["email"]);
            #header("location: index.html");
           
            echo "wow funge";
            echo "id: $idUser";
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