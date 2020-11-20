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
<div class="container">
    <table class="table">
        <?php
            if ($_POST['meno'] == 'admin') {
        ?>
        <tr>
            <th>Meno</th>
            <th>Priezvisko</th>
            <th>Dátum stretnutia</th>
            <th>Počet osôb</th>
        </tr>
        <?php } else { ?>
        <tr>
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
                } else {
                    echo "<tr class='rezervacie'>";
                    echo "<td>" . $prvok->getDatum() . "</td>";
                    echo "<td>" . $prvok->getPocetOsob() . "</td>";
                }
            }
        ?>
</table>
</div>
</body>
</html>


