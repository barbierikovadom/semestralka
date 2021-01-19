<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../databaza/databaza.php';
include '../databaza/Pouzivatel.php';


if($_SESSION['meno'] == null){
    header("LOCATION: prihlasenie.php");
} else {
    $_POST['meno'] = $_SESSION['meno'];
    include 'headAdmin.php';
}
$databaza = new databaza();
?>
<h1 class="text-center">Používatelia</h1>
        <div class="container telo" id="telo">
            <table class="table">
                <tr>
                    <th>LOGIN</th>
                    <th>MENO A PRIEZVISKO</th>
                    <th>EMAIL</th>
                </tr>
                <?php
                foreach ($databaza->nacitajVsetkychPouzivatelov() as $pouzivatel) {
                    echo "<tr class='table menu'>";
                    echo "<td>" . $pouzivatel->getKrsneMeno() . "</td>";
                    echo "<td>" . $pouzivatel->getPriezvisko() . "</td>";
                    echo "<td>" . $pouzivatel->getEmail() . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
