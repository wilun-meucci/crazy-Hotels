<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Crazy Hotels</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/searchbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
</head>

<?php
    function eliminaCookie() {
    // Recupera l'elenco dei cookie
    $cookies = $_COOKIE;
    // Scandisce l'elenco dei cookie e li elimina
    foreach ($cookies as $nome => $valore) {
        setcookie($nome, '', time() - 3600, '/');
    }
}

// Verifica se il pulsante di eliminazione è stato cliccato
if (isset($_POST['elimina_cookie'])) {
    eliminaCookie();
    header("location: index.php");
}


?>
<?php
session_start();
$_SESSION['checkin'] = "2022-10-23";
$_SESSION['checkout'] = "2022-10-23";


require_once "./db/connectDB.php";

if(isset($_POST['posto']))
{
    $_SESSION['posto'] = $_POST['posto'];
}

?>
<body style="background-color: burlywood;">
    
    <!--Cpmtomaasdgsdfsdf-->
    <!--container-->
    <div class="container-fluid text-center position-relative" style="min-height: 200vh;">
    <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <!--navbar-->
                <div class="navbar">
                    <a href="index.php"><img src="iconphoto/crazylogo5.png" alt="3" id="logonav"></a>
                    <?php

                   
                    if (!isset($_SESSION["user"])) {
                        $login = false;
                    }
                    else
                        $login = $_SESSION["login"];    

                    if ($login) {
                        echo "
                        <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
                        ".$_SESSION['user']["nome"]." 
                        </button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                                <li><a href='./php/leMiePrenotazioni.php'><button class='dropdown-item' type='button'>Le Mie Prenotazioni</button></a></li>
                                <form action='index.php' method='post'>
                                    <li>
                                        <input type='submit' name='esci' value='Esci' class='dropdown-item'>
                                    </li>
                                </form>
                            </ul>
                        </div>";
        

                    ?>
                    <?php
                    }
                    else {
                        echo '<a href="html/login.html"><button type="button" class="btn btn-light">accedi</button></a>';
                    }
                    ?>
                    <?php
                        //EXIT
                        if (isset($_POST['esci'])) {
                            #$_SESSION["login"] = false;
                            require("./php/logout.php");
                            #header("location: ./php/logout.php");
                            logout();
                            header("location: index.php");
                            #$_SERVER['PHP_SELF'];
                        }
                    ?>
                </div>
                <!--searchBar-->
                <div>
                    <form method="post" class="search" >
                        <input type="text" placeholder="dove vuoi andare ?" name="posto" id="posto" class="input-group-text">
                <!--Scegli date -->

                <?php
                 if(isset($_POST['checkin']))
                    {
                        $_SESSION['checkin'] = $_POST['checkin'];
                        $_SESSION['checkout'] = $_POST['checkout'];
                        $_SESSION['numViaggiatori'] = $_POST['numViaggiatori'];

                        echo "<div><label style='color: aliceblue;'> Data Check-in : ".$_SESSION['checkin']." </label>
                        <label style='color: aliceblue;'> Data Check-Out : ".$_SESSION['checkout']." </label>
                        <label style='color: aliceblue;'> Numero Persone :  ".$_SESSION['numViaggiatori']." </label>
                        <a href='./index.php'><button type='submit' class='btn btn-primary'>Cambia</button></a>
                        </div></div>
                        ";
                        
                    }
                    else
                    {
                        echo "<div>
                        <label for='checkin' style='color: aliceblue;'>Data Check-in</label>
                        <input required type='date' name='checkin' class='datepicker' id='checkin' class='input-group-text'>
                        <label for='checkout' style='color: aliceblue;'>Data Check-out</label>
                        <input required type='date' name='checkout' class='datepicker' id='checkout' class='input-group-text'>
                        <label for='numViaggiatori' style='color: aliceblue;'>Persone</label>
                        <input required type='number' name='numViaggiatori' id='numViaggiatori'>
                        <button style='border-radius:10px' class='btn btn-light'><i class='bi bi-search'></i></button>
                        </div><br><br><br></div>
                        
                        </form>";
                        
                    }
                ?>


                <!--Carosel-->
                    <div id="carouselExampleIndicators" class="carousel slide w-100" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="immagini/prova.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="immagini/fotocopertinamare.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="immagini/ciao.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                        <br><br>
                    <?php

                        if(isset($_SESSION["posto"]) and isset($_SESSION['numViaggiatori']))
                        {
                            require("./db/databaseQuery.php");
                        
                                $q = "SELECT h.idhotel, h.nome, h.indirizzo, h.citta, h.descrizione
                                FROM hotel h join camere c on c.idhotel = h.idhotel
                                WHERE c.idCamera NOT IN (
                                    SELECT c.idCamera
                                    FROM prenotazioni p
                                    INNER JOIN camere c ON p.idCamera = c.idCamera join hotel h on h.idhotel = c.idhotel
                                    WHERE (p.dataCheckIn <= '".$_SESSION['checkin']."' AND p.dataCheckOut >= '".$_SESSION['checkin']."')
                                        OR (p.dataCheckIn <= '".$_SESSION['checkout']."' AND p.dataCheckOut >= '".$_SESSION['checkout']."')
                                        OR ('".$_SESSION['checkin']."' <= p.dataCheckIn AND '".$_SESSION['checkout']."' >= p.dataCheckIn)
                                )  AND h.citta = '".$_SESSION['posto']."'
                                AND EXISTS (
                                    SELECT c.idCamera
                                    FROM camere c
                                    WHERE c.idHotel = h.idHotel
                                    AND c.postitotali >= '".$_SESSION['numViaggiatori']."'
                                ) 
                                GROUP BY h.idHotel ";

                                $result = $connessione ->query($q) or die($connessione ->error);
                                if($result->num_rows == 0)
                                    echo "<h2>Non Sono Presenti Hotel in Queste Date o In Questa Città</h2>";
                            
                        }
                        else{
                            $q = "SELECT h.idhotel, h.nome, h.descrizione, c.idcamera FROM hotel h JOIN camere c ON h.idhotel = c.idhotel GROUP BY c.idHotel";
                            $result = $connessione ->query($q) or die($connessione ->error);
                            if($result->num_rows == 0)
                                    echo "<h2>Non Sono Presenti Hotel in Queste Date o In Questa Città</h2>";
                        }
                        
                        while ($row = $result->fetch_assoc()) {

                                $q1 ="SELECT i.url from immaginicamera i join camere c on c.idcamera = i.idcamera join hotel h on h.idhotel = c.idhotel  where h.idhotel = ".$row['idhotel']." LIMIT 1";
                                $result1 = $connessione ->query($q1);
                                
                                    echo"
                                        <div class='card w-25 float-start'>
                                        <img src='".$result1->fetch_assoc()['url']."' class='card-img-top' style:'height: 200px;
                                        width: 100%;'>
                                        <div class='card-body'>
                                            <a href='php/paghotel.php?nome=".$row['nome']."'>
                                            <h5 class='card-title'>". $row['nome'] ."</h5>
                                            </a>
                                            <p class='card-text'>".$row['descrizione']."</p>
                                        </div>
                                </div>";
                                
                                
                         
                        }
                
                    ?>
                </div>
                
            <div class="col-md-2">
            </div>
            <!--Footer-->

            <!--Sistemare il footer per averlo completo-->
        
            <div class="footer position-absolute b-0">
            <form method="post">
    <input type="submit" name="elimina_cookie" value="Elimina Cookie" style="opacity: 0; position: absolute; top: 0; left: 0; width: 50px; height: 30px; overflow: hidden;">
</form>


                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                    <footer class="d-flex flex-wrap justify-content-between align-items-center py-1 my-1">
                        <div class="col-md-4 d-flex align-items-center">
                        <span class="mb-1 mb-md-0" style="color:antiquewhite;">&copy; 2022 Company, Inc</span>
                        </div>
                        <a href="index.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3">
                            <img src="iconphoto/crazylogo5.png"  style="width: 80px;
                                                                        height: 50px;
                                                                        float: left;
                                                                        margin-top: 1%;">
                        </a>
                        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                            <li class="ms-3"><a style="color:antiquewhite;" href="https://it-it.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a></li>
                            <li class="ms-3"><a style="color:antiquewhite;" href="https://www.instagram.com/accounts/login/" target="_blank"><i class="bi bi-instagram"></i></a></li>
                            <li class="ms-3"><a style="color:antiquewhite;" href="https://web.whatsapp.com" target="_blank"><i class="bi bi-whatsapp"></i></a></li>
                        </ul>
                    </footer>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        checkin.min = new Date().toISOString().split("T")[0];
        checkout.min = new Date().toISOString().split("T")[0];
        document.getElementById('checkin').value = new Date().toISOString().split("T")[0];
        document.getElementById('checkout').value = new Date().toISOString().split("T")[0];
        document.getElementById('numViaggiatori').value = 1;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
</body>

</html>