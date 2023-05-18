<?php
    if(isset($_POST["posto"]))
    {
        
        session_start();
        require("./db/databaseQuery.php");
        if(exitsHotel($_POST["posto"]))
        {
            echo "posto:".$_POST["posto"];
            $_session["hotel"] = getHotel($_POST["posto"]);
            foreach ($_session["hotel"] as $key => $value) {
                echo $key . ": " . $value . "<br>"; // Stampa la chiave e il valore di ogni elemento dell'array
            }
        
        }
        else {
            echo "non esiste";
        }
    }
?>