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
            <a href="../index.php"><button class="btn btn-primary mt-3">Indietro</button></a>
            </div>
            <div class="col-md-8">
                <?php
                require_once "../db/connectDB.php";

                session_start();
                $_SESSION['nome'] = $_GET['nome'];
                $q = "SELECT * FROM hotel WHERE nome = '" . $_SESSION['nome'] . "' ";
                $result = $connessione->query($q) or die($connessione->error);

                if (!isset($_SESSION['numViaggiatori'])) {
                    $q2 = "SELECT c.*
                    FROM hotel h join camere c on c.idhotel = h.idhotel
                    WHERE c.idCamera NOT IN (
                        SELECT c.idCamera
                        FROM prenotazioni p
                        INNER JOIN camere c ON p.idCamera = c.idCamera join hotel h on h.idhotel = c.idhotel
                        WHERE (p.dataCheckIn <= '".$_SESSION['checkin']."' AND p.dataCheckOut >= '".$_SESSION['checkin']."')
                            OR (p.dataCheckIn <= '".$_SESSION['checkout']."' AND p.dataCheckOut >= '".$_SESSION['checkout']."')
                            OR ('".$_SESSION['checkin']."' <= p.dataCheckIn AND '".$_SESSION['checkout']."' >= p.dataCheckIn)
                    ) AND h.nome = '".$_SESSION['nome']."'";
                } else {
                    $q2 = "SELECT c.*, h.idHotel
                    FROM hotel h join camere c on c.idhotel = h.idhotel
                    WHERE c.idCamera NOT IN (
                        SELECT c.idCamera
                        FROM prenotazioni p
                        INNER JOIN camere c ON p.idCamera = c.idCamera join hotel h on h.idhotel = c.idhotel
                        WHERE (p.dataCheckIn <= '".$_SESSION['checkin']."' AND p.dataCheckOut >= '".$_SESSION['checkin']."')
                            OR (p.dataCheckIn <= '".$_SESSION['checkout']."' AND p.dataCheckOut >= '".$_SESSION['checkout']."')
                            OR ('".$_SESSION['checkin']."' <= p.dataCheckIn AND '".$_SESSION['checkout']."' >= p.dataCheckIn)
                    )  AND h.citta = '".$_SESSION['posto']."' AND h.nome = '".$_SESSION['nome']."'
                    AND EXISTS (
                        SELECT c.idCamera
                        FROM camere c
                        WHERE c.idHotel = h.idHotel
                        AND c.postitotali >= '".$_SESSION['numViaggiatori']."'
                    ) ";
                }

                $result2 = $connessione->query($q2) or die($connessione->error);
                echo "<h1 class='titolo'>" . $_SESSION['nome'] . " </h1> <br>";
                // stamp camere non presneti in prenotazione
                while ($row = $result->fetch_assoc()) {
                    while ($row1 = $result2->fetch_assoc()) {
                        $q1 = "SELECT i.url from immaginicamera i join camere c on i.idCamera = c.idCamera  where c.idCamera = " . $row1['idCamera'] . " LIMIT 1";
                        $result1 = $connessione->query($q1) or die($connessione->error);


                        echo "
                         <div class='row'>
                         <div class='col-md-6'>
                            <img src='" . $result1->fetch_assoc()['url'] . "' style='width:100%'>
                         </div>
                         <div class='col-md-6'>
                            <div class='info'>";

                        echo "<br><h1>" . $row1['nomeCamera'] . "</h1> <br>";
                        echo "<h5>numero stanza: </h5><p1>" . $row1['numeroCamera'] . "</p1> <br>";
                        echo "<h5>numero letti: </h5><p1>" . $row1['numeroLetti'] . "</p1> <br>";
                        echo "<h5>metri quadrati: </h5><p1>" . $row1['metriQuadrati'] . "</p1> <br>";
                        echo "<h5>posti totali: </h5><p1>" . $row1['postitotali'] . "</p1> <br>";
                        echo "<h5>descrizione: </h5><p1>" . $row1['descrizione'] . "</p1> <br><br>";

                        if(isset($_SESSION['user'])){
                            

                            echo " <form action='./leMiePrenotazioni.php' method='post'>
                                   <button type='submit'>PRENOTA</button>
                                    <input type='hidden' name='idCamera' value='".$row1['idCamera']."'>
                                    </form> <br><br>";
                        }

                        echo "    
                        </div>
                        
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