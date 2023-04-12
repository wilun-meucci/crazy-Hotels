<?php
    # funzione per collegarsi con il database
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crazyhotels";
        $connessione = new mysqli($servername, $username, $password, $dbname);
        if ($connessione->connect_error) 
        {
            #aggiungere un visuallizazione migliore
            echo "dio cane";
            die("Connection failed: " . $connessione->connect_error);
        } 
        else return $connessione;
        
    }

    
?>