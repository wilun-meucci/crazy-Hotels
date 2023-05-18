<?php
    if(isset($_POST["posto"]))
    {
        
        session_start();
        require("./db/databaseQuery.php");
        if(exitsHotel($_POST["posto"]))
        {
            echo "posto:".$_POST["posto"];
        }
        else {
            echo "non esiste";
        }
    }
?>