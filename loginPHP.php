<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php
    
    function checkExistUser($email,$psw, $connessione) 
    {
        $sql = "SELECT * FROM utenti where email = '$email' and  psw='$psw'";
        $result = $connessione->query($sql);
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;

    }
    
    function getIdUSer()
    {
        return "1";
    }

    if(isset($_POST["email"]))
    {
        session_start();
        require ( "connectDB.php");
        $connessione= connectDB();
        
        if(checkExistUser($_POST["email"] , $_POST["password"], $connessione))
        {
            $_SESSION["idUser"] = getIdUSer();
            header("location: login.html");
        }
        
    } 
    else 
    {
        echo "sei stupido";
        #header("location: login.html");
    }
?>
<body>
    body
</body>
</html>