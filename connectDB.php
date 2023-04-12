<?php
    # funzione per collegarsi con il database
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crazyhotels";
        $connessione = new mysqli("localhost", "root", "", "crazyhotels");
        if ($connessione->connect_error) 
        {
            #aggiungere un visuallizazione migliore

            die("Connection failed: " . $connessione->connect_error);
        } 
        else return $connessione;
        
    }

    
?>