<?php
    require ( "connectDB.php");
    $connessione = connectDB();
    function getUSer($email)
    {
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$email'";
        $result = $connessione->query($sql);
        return $result;
    }
    function getIdUSer($email)
    {
        return getUSer($email)["idUtente"];
    }

    function checkExistUser($email,$psw) 
    {
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$email' and  passwd='$psw'";
        echo "sql: $sql <br>";
        $result = $connessione->query($sql) or die("fail");
        echo "result: $result <br>";
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;

    }
    
?>