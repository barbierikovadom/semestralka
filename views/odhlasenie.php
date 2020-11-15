<?php

include "index.php";

if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
$databaza = new databaza();
unset($_SESSION['meno']);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stretnutia.css" type="text/css">
    <title>Odhlásenie</title>
</head>
<body>
<h2 class="display-1 text-center">Úspešne si sa odhlásil!</h2>
<!--<p class="text-center"> Prajete si opäť sa prihlásiť? </p>-->
<!--<a class="text-center" href="prihlasenie.php.php">Prihláste sa!</a>-->

<div class="karta" style="text-align: center">

    <h3 class="text-center"> Prajete si opäť sa prihlásiť? </h3>
<!--    <h3 class="text-center" href="prihlasenie.php">Prihláste sa!</h3>-->
    <h3><a class="linka" href='prihlasenie.php'>Prihláste sa!</a></h3>
</div>


</body>
</html>