<?php
    require ( "connectDB.php");
    $_SESSION["db"] = $connessione = connectDB();

    # fa una query al db tramite mail or idUtente
    function getUSer($id)
    {
        
        global $connessione;
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' ;";
        $result = $connessione->query($sql);
        return $result;
    }
    function query($sql)
    {
        global $connessione;
        $result = $connessione->query($sql) or die("fail");
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;
    }

    #controlla se l'utente esiste ed se la mail ed psw sono giusti
    function login($email,$psw) 
    {
        $sql = "SELECT * FROM utenti where email = '$email' and  passwd='$psw'";
        return query($sql);
        
    }
    function checkExistUser($id)
    {
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' OR nome = '$id' OR cognome= '$id'";
        return query($sql);
    }
    function getNumId()
    {
        $sql = "SELECT count(idUtente) FROM utenti";
        return intval($sql);
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