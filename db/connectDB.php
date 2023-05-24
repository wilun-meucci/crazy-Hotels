<?php
$servername = "localhost";  // Inserisci qui il nome del server del database
$username = "root";  // Inserisci qui il nome utente del database
$password = "";     // Inserisci qui la password del database
$dbname = "crazyhotels";  // Inserisci qui il nome del database

// Crea una connessione persistente
$connessione = new mysqli($servername, $username, $password, $dbname);

// Controlla se la connessione ha avuto successo
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}
