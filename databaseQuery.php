<?php
    require ( "connectDB.php");
    $connessione = connectDB();
    function getUSer($id)
    {
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' ;";
        $result = $connessione->query($sql);
        return $result;
    }
    function getIdUSer($id)
    {
        return getUSer($id)->fetch_assoc()["idUtente"];
    }

    function getNameUSer($id)
    {
        return getUSer($id)->fetch_assoc()["nome"];
    }

    function checkExistUser($email,$psw) 
    {
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$email' and  passwd='$psw'";
        $result = $connessione->query($sql) or die("fail");
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;

    }
    
?>