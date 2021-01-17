<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../databaza/databaza.php';
include '../databaza/PrvokRezervacie.php';

$databaza = new Databaza();

if($_SESSION['meno'] == null){
    header("LOCATION: prihlasenie.php");
} else {
    $_POST['meno'] = $_SESSION['meno'];
    if ($_POST['meno'] == 'admin') {
        include 'headAdmin.php';
    } else {
        include 'headPrihlaseny.php';
    }
}

if (isset($_POST['vytvorenieRezervacie'])) {

    $idPouzivatela = $databaza->najdiPouzivatela($_POST['meno']);
    $datum = $_POST['datum'];
    $pocetOsob = $_POST['pocetOsob'];

    $databaza->vytvorenieRezervacie($idPouzivatela, $datum, $pocetOsob);
}
?>
<html>
<title>Vytvorenie novej rezervácie</title>
<body>
<div class="container telo" id="telo" >
    <div class="mx-auto text-center ">
        <form method="post">
            <div>
                <label for="Dátum" class="col-sm-2 col-form-label" >Dátum</label>
                <input type="date" id="datum" name="datum" min=<?php echo date("Y-m-d"); ?> max=<?php echo date('Y-m-d', strtotime('+2 years')); ?>>
            </div>
            <div>
                <label for="Počet osôb" class="col-sm-2 col-form-label">Počet osôb</label>
                <input type="number" id="pocetOsob" min="1" max="5" name="pocetOsob">
            </div>
                <input type="submit" class="btn btn-success" id="vytvorenieRezervacie" name="vytvorenieRezervacie" value="vytvorenieRezervacie">
            </div>
        </form>
    <br>
    </div>
</div>
</body>
</html>


