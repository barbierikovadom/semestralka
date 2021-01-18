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
<div class="container nadpis">
    <h1 class="nadpis text-center">
        Všetky rezervácie:
    </h1>
</div>
<div class="container telo" id="telo">
    <?php
    if ($_POST['meno'] != 'admin') {
    ?>
        <br>
        <div class="mx-auto text-center ">
            <form method="post">
                <label class="col-sm-2 col-form-label" >Dátum</label>
                <input type="date" id="datum" name="datum" min=<?php echo date("Y-m-d"); ?> max=<?php echo date('Y-m-d', strtotime('+2 years')); ?>>
                <br>
                <label class="col-sm-2 col-form-label">Počet osôb</label>
                <input type="number" id="pocetOsob" min="1" max="5" name="pocetOsob">
                <br>
                <input type="submit" class="btn btn-success" id="vytvorenieRezervacie" name="vytvorenieRezervacie" value="vytvorenieRezervacie">
            </form>
            <br>
            <br>
        </div>
    <?php }?>
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
                    echo "</tr>";
                }
            }
        ?>
</table>
</div>
</body>
</html>


