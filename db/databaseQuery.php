<?php
    
    require ( "connectDB.php");
    $connessione = connectDB();

    # fa una query al db tramite mail or idUtente
    function getUSer($id)
    {
        
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' ;";
        $result = $connessione->query($sql);
        return $result;
    }

    #controlla se l'utente esiste ed se la mail ed psw sono giusti
    function login($email,$psw) 
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
    function checkExistUser($id)
    {
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' OR nome = '$id' OR cognome= '$id'";
        $result = $connessione->query($sql) or die("fail");
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;
    }

    #ritorna il idUtente
    function getIdUSer($id)
    {
        return getUSer($id)->fetch_assoc()["idUtente"];
    }
    #ritorna il nome
    function getNameUSer($id)
    {
        return getUSer($id)->fetch_assoc()["nome"];
    }
    #ritorna il cognome
    function getCognomeUSer($id)
    {
        return getUSer($id)->fetch_assoc()["nome"];
    }
    #ritorna la mail
    function getEmailUSer($id)
    {
        return getUSer($id)->fetch_assoc()["nome"];
    }
    
?>