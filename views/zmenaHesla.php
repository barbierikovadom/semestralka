<?php
if (!isset($_SESSION)) {
    session_start();

}
include "../databaza/databaza.php";
include "headOdhlaseny.php";
include  "../databaza/Pouzivatel.php";

$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];

$pouzivatel = $databaza->nacitajPouzivatela($_POST['meno']);
echo "<div class='container telo' style='text-align: center'>";
echo "<br>";
echo "<p> LOGIN : " . $pouzivatel->getKrsneMeno().  "</p>";
echo "<p> Meno a Priezvisko : " . $pouzivatel->getPriezvisko() . "</p>";
echo "<p>  EMAIL : ". $pouzivatel->getEmail() . " </p>";
echo "<br>";
echo "</div>";

if(isset($_POST['heslo'])) {
    $databaza->zmenaHesla($_POST['meno'], $_POST['heslo']);
    unset($_SESSION['meno']);
    session_destroy();
}

?>
<div class="telo container" style="text-align: center">
    <h3>Zadaj nové heslo</h3>
    <form id="login" method="post">
        <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
        <input type="submit">
    </form>
</div>
