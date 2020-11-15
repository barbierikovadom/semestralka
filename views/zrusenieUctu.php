<?php
include "index.php";

if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];
unset($_SESSION['meno']);
session_destroy();
if($databaza->odstranenieUctu($_POST['meno'])){
    header("LOCATION: prihlasenie.php");
}
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


</body>
</html>
