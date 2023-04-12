<?php
   
    function conn ()
    {
        require ( "connectDB.php");
        $connessione = connectDB();
        return $connessione;
    }

    $connessione = conn();
    echo  gettype($connessione);
    function getUSer($email)
    {
        echo "<b>getUSer dio <br></b>";
        $sql = "SELECT * FROM utenti where email = '$email'";
        echo "email: <br>" . $email ."<br>";
        echo "sql: <br>" . $sql ."<br>";
        $result = $connessione->query($sql);
        return $result;
    }
    function getIdUSer($email)
    {
        return getUSer($email)["idUtente"];
    }

    function checkExistUser($email,$psw) 
    {
        $sql = "SELECT * FROM utenti where email = '$email' and  passwd='$psw'";
        echo "email: <br>" . $email ."<br>";
        echo "psw: <br>" . $psw ."<br>";
        echo "sql: <br>" . $sql ."<br>";
        $result = $connessione->query($sql) or die("fail");
        if($result->num_rows > 0 )
        {
            return true;
        }
        else return false;

    }
    
?>