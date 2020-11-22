<?php
if (!isset($_SESSION)) {
    session_start();

}
include "../databaza/databaza.php";
include "headOdhlaseny.php";

$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];
if(isset($_POST['heslo'])) {
    $databaza->zmenaHesla($_POST['meno'], $_POST['heslo']);
    unset($_SESSION['meno']);
    session_destroy();
}

?>

<html>
    <title>Zmena hesla</title>
<body>
<div class="karta" style="text-align: center">
    <form id="login" method="post">
        <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
        <input type="submit">
    </form>
</div>

</body>
</html>