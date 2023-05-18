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
    function queryBool($sql)
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
        return queryBool($sql);
        
    }
    function checkExistUser($id)
    {
        $sql = "SELECT * FROM utenti where email = '$id' OR idUtente = '$id' OR nome = '$id' OR cognome= '$id'";
        return queryBool($sql);
    }
    function getNumId()
    {
        $sql = "SELECT count(idUtente) FROM utenti";
        echo 'number: '.$sql;
        return intval(queryBool($sql));
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
    
    function cardName()
    {
        global $connessione;
        $q = "SELECT nome FROM hotel LIMIT 4";
        $result = $connessione ->query($q);

        while ($row = $result->fetch_assoc()) {
            echo"<div class='card w-25 float-start'>
                        <img src='iconphoto/crazylogo2.png' class='card-img-top '>
                        <div class='card-body'>
                            <h5 class='card-title'>". $row['nome'] ."</h5>
                            <p class='card-text'>This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>";
        }
    }
    function exitsHotel($id)
    {
        $q = "SELECT * FROM hotel where nome ='$id'  or citta ='$id'  or  descrizione = '$id'  or indirizzo ='$id'  or  mail = '$id' or idHotel = '$id'" ;
        return queryBool($q);
    }

    function getHotel($id)
    {
        global $connessione;
        $q = "SELECT * FROM hotel where nome ='$id'  or citta ='$id'  or  descrizione = '$id'  or indirizzo ='$id'  or  mail = '$id' or idHotel = '$id'" ;
        $result = $connessione ->query($q);
        return $result->fetch_assoc();

    }
?>