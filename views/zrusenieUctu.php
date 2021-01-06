<?php
include "headOdhlaseny.php";

if (!isset($_SESSION)) {
    session_start();
}
include "../databaza/databaza.php";
$databaza = new databaza();
$_POST['meno'] = $_SESSION['meno'];
$prihlasenyPouzivatel = $databaza->prihlasenie($_POST['meno'])->fetch_assoc();

if(isset($_POST['heslo'])) {
    $hesloDatabaza = $prihlasenyPouzivatel['heslo'];
    if (password_verify($_POST['heslo'], $hesloDatabaza)) {
        $databaza->odstranenieUctu($_POST['meno']);
        header("LOCATION: registracia.php");
        unset($_SESSION['meno']);
        session_destroy();
    }
    else{
        echo "Zle heslo";
    }
}
?>

<html>
<title>Zmazanie účtu</title>
<body>
<div class="container telo">
    <h2 class="zrusenie text-center">
        <br>
        Prajete si zrušiť váš účet?
        <br>
    </h2>
    <p class="ucet text-center">
        Účet:
        <?php echo $_POST['meno'] ?>
    </p>
    <p class="text-center">
        Pre zrušenie vášho účtu zadajte heslo
        <br>
    </p>
    <form id="login" method="post" class="text-center">
        <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
        <input type="submit">
    </form>
    <br>
</div>

</body>
</html>