<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="hlavne.css">
</head>
<body>

<!--footer-->
<div class="footer">
    <p>Dominika Web Design, Copyright &copy; 2020</p>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="obrazkyUvod/chmel.jpg" alt="budova podniku">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="obrazkyUvod/slide-01.jpg" alt="vnútro podniku">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="obrazkyUvod/slide-03.jpg" alt="výčap spredu">
        </div>
    </div>
</div>

<!--menu-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
    <a class="navbar-brand" href="#">
        <img src="logo.png" width="50" height="50" alt="" loading="lazy">
    </a>
    <a class="navbar-brand nazov" href="uvodna_strana.html">Piváreň u nás</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse stranky" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="uvodna_strana.html">O nás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pohare.html">Poháre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Kontakt.html">Kontakt</a>
            </li>
        </ul>
    </div>
</nav>


<div class="piva">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    Čapujeme:
                </h1>
            </div>
        </div>
        <?php
            $capujeme = fopen("capujeme.txt", "r") or die("Unable to open file!");
            $piva = fopen("piva.txt", "r") or die("Unable to open file!");
            $obrazky = fopen("obrazky.txt", "r") or die("Unable to open file!");
            while(!feof($capujeme) && !feof($obrazky) && !feof($piva)) {
        ?>
        <div class="row">
            <img src="<?php echo fgets($obrazky)?>" alt="..." class="rounded mx-auto d-block img-fluid">
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">
                    <?php
                        echo fgets($piva)
                    ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-center">
                    <?php
                        echo fgets($capujeme)
                    ?>
                </p>
            </div>
        </div>
         <?php
            }
            fclose($capujeme);
            fclose($piva);
            fclose($obrazky);
         ?>
    </div>
</div>

</body>
</html>
