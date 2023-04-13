<?php
    require ( "connectDB.php");
    $connessione = connectDB();

    function registration($nome,$cognome,$mail,$psw,$telefono,$gender)
    {
        global $connessione;
        #$sql = "SELECT * FROM utenti where email = '$email' and  passwd='$psw'";
        $insertInto = "INSERT INTO utenti (nome,cognome,email,numero,gender,,passw) VALUES ('$nome', '$cognome', '$mail', '$telefono', '$gender','$psw');";
        $result = $connessione->query($insertInto) or die("fail");
        if ($result=== TRUE) 
        {
            return true;
        } else 
        {
            echo "(/db/databaseInsert.php/registration/else)Error: " . $insertInto . "<br>" . $connessione->error;
            return false;
        }
    }
?>