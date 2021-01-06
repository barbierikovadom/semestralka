<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../databaza/PrvokMenu.php';
include '../databaza/databaza.php';

if($_SESSION['meno'] == null){
    header("LOCATION: prihlasenie.php");
} else {
    $_POST['meno'] = $_SESSION['meno'];
    include 'headAdmin.php';
    $databaza = new databaza();
    echo "<div class='container telo'>";
        echo "<table class='table'>";
            foreach ($databaza->nacitanieMenu() as $prvok) {
                echo "<tr class='table'>";
                echo "<td>" . $prvok->getObrazok() . "</td>";
                echo "<td>" . $prvok->getNazovPiva() . "</td>";
                echo "<td>" . $prvok->getTypPiva() . "</td>";
                echo "<td><button >Zmaz</button></td>";
            //TODO: dorobit update tabulky
                echo "<td><button         >Zmen</button></td>";
                echo "</tr>";
            }
        echo "</table>";
    echo "</div>";
}
?>

