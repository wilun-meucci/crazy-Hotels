<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/searchbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body style="background-color: burlywood;" class="text-center">
<div class="container-fluid text-center position-relative">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                    <?php
                        if(isset($_POST["posto"]))
                        {
                            
                            session_start();
                            require("../db/databaseQuery.php");
                            if(exitsHotel($_POST["posto"]))
                            {
                                echo "<h1>".$_POST["posto"]."</h1>";

                                $q = "SELECT * FROM hotel h WHERE h.citta = '".$_POST["posto"]."'";
                                $result = $_SESSION["db"] ->query($q) or die($_SESSION["db"] ->error);

                                while ($row = $result->fetch_assoc()) {

                                echo"<div class='info'>";
                                    echo"<p>Nome: ".$row['nome']."</p>";
                                    echo"<p>Indirizzo: ".$row['indirizzo']."</p>";
                                    echo"<p>Numero stelle: ".$row['Nstelle']."</p>";
                                    echo"<p>Mail: ".$row['mail']."</p>";
                                    echo"<p>Numero Tel.: ".$row['numero']."</p>";
                                    echo"<p>Descrizione: ".$row['descrizione']."</p>";
                                    echo"</div><br><br>";
                                }
                                
                            }
                            else {
                                echo "non esiste";
                            }
                            
                        }
                    ?>
            </div>
            <div class="col-md-2">

            </div>
   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>