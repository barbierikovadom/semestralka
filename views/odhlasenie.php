<?php

include "headOdhlaseny.php";

if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
$databaza = new databaza();
unset($_SESSION['meno']);
session_destroy();
?>
<h2 class="display-1 text-center">Úspešne si sa odhlásil!</h2>
<div class="karta" style="text-align: center">

    <h3 class="text-center"> Prajete si opäť sa prihlásiť? </h3>
    <h3><a class="linka" href='prihlasenie.php'>Prihláste sa!</a></h3>
</div>