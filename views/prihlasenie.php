<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
include "headOdhlaseny.php";

$databaza = new databaza();
if (isset($_POST['meno']) && isset($_POST['heslo']) ) {
    $prihlasenyPouzivatel = $databaza->prihlasenie($_POST['meno'])->fetch_assoc();
    if($prihlasenyPouzivatel != null) {
        $hesloDatabaza = $prihlasenyPouzivatel['heslo'];
        if (password_verify($_POST['heslo'], $hesloDatabaza)) {
            $_SESSION['meno'] = $_POST['meno'];
            header("LOCATION: uvodna_strana.php");
        }
    }
}
?>

<html>
<title>Prihlásenie</title>

<body>
<div class="karta" style="text-align: center">
    <form id="login" method="post">
        <label>Meno: <input required name="meno" style="margin: 10px" type="text"></label><br>
        <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
        <input type="submit">
    </form>
    <span class="registrovanie">Nemáte prihlasovacie meno a heslo?</span>
    <a class="registrovanie" href="registracia.php">Zaregistrujte sa!</a>
</div>

</body>
</html>