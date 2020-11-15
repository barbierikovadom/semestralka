<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
include "root.layout.view.php";

$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];
if(isset($_POST['heslo'])) {
    $databaza->zmenaHesla($_POST['meno'], $_POST['heslo']);
    unset($_SESSION['meno']);
    session_destroy();
    header("LOCATION: prihlasenie.php");
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zmena hesla</title>
</head>
<body>
<div class="karta" style="text-align: center">
    <form id="login" method="post">
        <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
        <input type="submit">
    </form>
</div>

</body>
</html>