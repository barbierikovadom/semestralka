<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@800&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../hlavne.css">
</head>
<body>

<!--footer-->
<footer class="fixed-bottom">
    <div class="footer container text-center">
        <p>Dominika Web Design, Copyright &copy; 2020</p>
    </div>
</footer>

<header id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/obrazkyUvod/chmel.jpg" alt="budova podniku">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/obrazkyUvod/slide-01.jpg" alt="vnútro podniku">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/obrazkyUvod/slide-03.jpg" alt="výčap spredu">
        </div>
    </div>
</header>

<!--menu-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">
        <img src="../images/logo.png" width="35" height="35" alt="" loading="lazy">
    </a>
    <a class="navbar-brand nazov" href="uvodna_strana.html">Piváreň u nás</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse stranky" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="uvodna_strana.php">O nás</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pohare.php">Poháre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kontakt.php">Kontakt</a>
            </li>
        </ul>

        <ul class="navbar-nav my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nastavenia účtu</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="zrusenieUctu.php">Zrušenie účtu</a>
                    <a class="dropdown-item" href="zmenaHesla.php">Zmena hesla</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="odhlasenie.php">Odhlásiť sa</a>
            </li>
        </ul>
    </div>
</nav>

<!--<div class="web-content">-->
<!--    --><?//= $contentHTML ?>
<!--</div>-->

</body>
</html>
