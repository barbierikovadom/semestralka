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
?>

<html>
<title>Všetky rezervácie</title>
<body>
<div class="container nadpis">
    <h1 class="nadpis text-center">
        Všetky rezervácie:
    </h1>
</div>
<div class="container telo" id="telo">

    <table class="table">
        <?php
            if ($_POST['meno'] == 'admin') {
        ?>
        <tr class="tabulka">
            <th>Login</th>
            <th>Priezvisko</th>
            <th>Dátum stretnutia</th>
            <th>Počet osôb</th>
        </tr>
        <?php } else { ?>
        <tr class="tabulka">
            <th>Dátum stretnutia</th>
            <th>Počet osôb</th>
        </tr>
        <?php }
            foreach ($databaza->nacitajRezervacie($_POST['meno']) as $prvok) {

                if ($_POST['meno'] == 'admin') {
                    echo "<tr class='rezervacie'>";
                    echo "<td>" . $prvok->getMeno() . "</td>";
                    echo "<td>" . $prvok->getPriezvisko() . "</td>";
                    echo "<td>" . $prvok->getDatum() . "</td>";
                    echo "<td>" . $prvok->getPocetOsob() . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr class='rezervacie'>";
                    echo "<td>" . $prvok->getDatum() . "</td>";
                    echo "<td>" . $prvok->getPocetOsob() . "</td>";
                    echo "<tr>";
                }
            }
        ?>
</table>
</div>
</body>
</html>


