<?php
    function logout($id)
    {
        if(isset($_SESSION["$id"]))
        {
            unset($_SESSION["$id"]);
            echo gettype($_SESSION["user"]);
            echo var_dump($_SESSION);
            echo "ok";
        }
        else 
        {
            echo "oh no";
            echo gettype($_SESSION["$id"]);
            echo var_dump($_SESSION);
        }
        

    }
    session_start();
    logout($_SESSION["user"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" value="ciao" name="ciao">
    </form>
</body>
</html>