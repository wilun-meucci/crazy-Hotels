<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Crazy Hotels</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body style="background-color: burlywood;">

    <!--container-->
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <!--navbar-->
                <div class="navbar">
                    <a href="index.php"><img src="iconphoto/crazylogo5.png" alt="3" id="logonav"></a>
                    <?php

                    session_start();
                    if (!isset($_SESSION["login"])) {
                        $login = false;
                    }
                    else
                        $login = $_SESSION["login"];    

                    if ($login) {
                        echo "
                        <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
                        ".$_SESSION['nameUser']." 
                        </button>
                        <ul class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                          <li><button class='dropdown-item' type='button'>Le Mie Prenotazioni</button></li>
                          <li><button class='dropdown-item' type='button'>fsffd</button></li>
                          <li><button class='dropdown-item' type='button'>Esci</button></li>
                        </ul>
                      </div>

                    
                        ";
                    ?>
                    <?php
                    }
                    else {
                        echo '<a href="html/login.html"><button type="button" class="btn btn-light">accedi</button></a>';
                    }
                    ?>
                </div>

                <div class="search">
                    <form method="" class="bar-search">
                    <input type="text" placehoder="search destination" name="posto" id="posto">
                    <button><i class="bi bi-search"></i></button>
                     </form>
                     <br><br><br><br><br><br><br><br>
                </div>
                <!--Carosel-->
                    <div id="carouselExampleIndicators" class="carousel slide w-50 float-start" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="iconphoto/crazylogo1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="iconphoto/crazylogo2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="iconphoto/crazylogo3.png" class="d-block w-100" alt="...">
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
                    <h1 class="padding">chi siamo</h1>
                </div>
            <div class="col-md-2">
            </div>
            <!--Footer-->

            <!--Sistemare il footer per averlo completo-->

            <div class="footer">
                <div class="row">
                    <div class="col-md-3">
                        <hr class="l">
                    </div>
                    <div class="col-md-6">
                    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4">
                        <div class="col-md-4 d-flex align-items-center">
                        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                        </a>
                        <span class="mb-3 mb-md-0 text-light">© 2022 Company, Inc</span>
                        </div>

                        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3"><a class="text-light" href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a></i></li>
                        <li class="ms-3"><a class="text-light" href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a></li>
                        <li class="ms-3"><a class="text-light" href="https://wa.me/390123456789"><i class="bi bi-whatsapp"></i></a></li>
                        </ul>
                    </footer>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>