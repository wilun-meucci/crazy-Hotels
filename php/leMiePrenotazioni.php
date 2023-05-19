<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/searchbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>prenotazioni </title>
</head>

<body>
     <!--Cpmtomaasdgsdfsdf<-->
    <!--container-->
    <div class="container-fluid text-center position-relative" style="min-height: 130vh;">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <!--navbar-->
                <div class="navbar">
                    <a href="../index.php"><img src="../iconphoto/crazylogo.png" alt="3" id="logonav"></a>
                    <?php

                    session_start();
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
                                <li><a href='./html/leMiePrenotazioni.html'><button class='dropdown-item' type='button'>Le Mie Prenotazioni</button></a></li>
                                <li><button class='dropdown-item' type='button'>fsffd</button></li>
                                <form action='index.php' method='post'>
                                    <li>
                                        <input type='submit' name='esci' value='Esci' class='dropdown-item'>
                                    </li>
                                </form>
                            </ul>
                        </div>

                    
                        ";
                    //<button class='dropdown-item' type='button' name='esci'>Esci</button>
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
                <div class="search">
                    <div class="bar-search text-center">
                    <h1> Le Tue Prenotazioni</h1>
                    </div>
                     <br><br><br><br><br><br><br><br>
                </div>

                
                    <?php
                        require ( "../db/connectDB.php");
                        $_SESSION["db"] = $connessione = connectDB();
                        $q = "SELECT idhotel, nome, descrizione FROM hotel LIMIT 4";
                        $result = $_SESSION["db"] ->query($q);

                        while ($row = $result->fetch_assoc()) {

                                $q1 ="SELECT i.url from immaginicamera i join camere c on c.idcamera = i.idcamera join hotel h on h.idhotel = c.idhotel  where idhotel = ".$row['idhotel']." LIMIT 1";
                                $result1 = $_SESSION["db"] ->query($q1) or die($_SESSION["db"] ->error);
                                
                         echo"<form action='./php/paghotel.php' method='POST'>
                            <div class='card w-25 float-start'>
                            <img src='".$result1->fetch_assoc()['url']."' class='card-img-top '>
                            <div class='card-body'>
                                <h5 class='card-title'>". $row['nome'] ."</h5>
                                <p class='card-text'>".$row['descrizione']."</p>
                            </div>
                    </div></form>";
        }
                    ?>
                </div>
                
            <div class="col-md-2">
            </div>
            <!--Footer-->

            <!--Sistemare il footer per averlo completo-->

            <div class="footer position-absolute b-0">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                    <footer class="d-flex flex-wrap justify-content-between align-items-center py-1 my-1">
                        <div class="col-md-4 d-flex align-items-center">
                        <span class="mb-1 mb-md-0" style="color:antiquewhite;">&copy; 2022 Company, Inc</span>
                        </div>
                        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3">
                            <img src="../iconphoto/crazylogo5.png"  style="width: 80px;
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


</body>
</html>