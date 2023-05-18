<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/searchbar.css">
    <link rel="stylesheet" href="../css/hotel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body style="background-color: burlywood;">
<div class="container-fluid text-center position-relative">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                    <?php

                        require ( "../db/connectDB.php");
                        session_start();
                        $_SESSION['nome'] = $_GET['nome'];
                        $_SESSION["db"] = $connessione = connectDB();
                        $q = "SELECT * FROM hotel WHERE nome = '" .$_SESSION['nome']. "' ";
                        $result = $_SESSION["db"] ->query($q) or die($_SESSION["db"] ->error);
                        $q2 = "SELECT c.* from camere c JOIN hotel h ON c.idhotel = h.idhotel where h.nome= '" .$_SESSION['nome']. "' ";
                        $result2 = $_SESSION["db"] -> query($q2) or die($_SESSION["db"] ->error);
                        echo "<h1 class='titolo'>". $_SESSION['nome']." </h1>" ;
  // stamp camere non presneti in prenotazione
                        while ($row = $result->fetch_assoc()) {
                            while ($row1 = $result2->fetch_assoc()) {
                            $q1 ="SELECT i.url from immaginicamera i join camere c on i.idCamera = c.idCamera  where c.idCamera = ".$row1['idCamera']." LIMIT 1";
                            $result1 = $_SESSION["db"] ->query($q1) or die($_SESSION["db"] ->error);
                            
                         
                         echo "
                         <div class='row'>
                         <div class='col-md-6'>
                            <img src='".$result1->fetch_assoc()['url']."' style='width:100%'>
                         </div>
                         <div class='col-md-6'>
                            <div class='info'>
                            <h1>Nome camera</h1>
                            ";
                            
                                echo"<p1>".$row1['nomeCamera']."</p1>";
                            
                            echo"
                        </div>
                        <a href=''><button>PRENOTA</button></a>
                         </div>
                         
                         </div>
                         <br>";
                            }
                        }
                    ?>
                    
            </div>
            <div class="col-md-2">
                        
            </div>
        </div>
 </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>