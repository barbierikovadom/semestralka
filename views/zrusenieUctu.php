<?php
include "headOdhlaseny.php";

if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];
unset($_SESSION['meno']);
session_destroy();
if($_POST['meno'] == 'admin'){
    echo "Ucet nie je mozne zrusit!";
    header("LOCATION: uvodna_strana.php");
} else {
    if($databaza->odstranenieUctu($_POST['meno'])) {
        header("LOCATION: registracia.php");
    }
}
?>
