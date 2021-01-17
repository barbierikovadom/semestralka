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
}
    $databaza = new databaza();
    echo "<div class='container telo'>";
        echo "<table class='table'>";
            foreach ($databaza->nacitanieMenu() as $prvok) {
                echo "<tr class='table menu'>";
                echo "<td>" . $prvok->getObrazok() . "</td>";
                echo "<td>" . $prvok->getNazovPiva() . "</td>";
                echo "<td>" . $prvok->getTypPiva() . "</td>";
                echo "<td><button class='delete' id=" .$prvok->getId(). " onclick='odstranPrvokMenu(" .$prvok->getId(). ")'>Zmaz</button></td>";
                echo "</tr>";
            }
        echo "</table>";
    echo "</div>";

if (isset($_POST['funkcia'])) {
    switch ($_POST['funkcia']) {
        case 'vytvorPrvok':
            $obrazok = $_POST['obrazok'];
            $typPiva = $_POST['typPiva'];
            $nazovPiva = $_POST['nazovPiva'];
            $databaza->pridajPrvokMenu($obrazok, $typPiva, $nazovPiva);
            return;
        case 'odstranPrvok' :
            $vymazany=$_POST['vymazannyPrvok'];
            echo $vymazany;
            $databaza->vymazPrvokMenu($_POST['vymazannyPrvok']);
            return;
    }
}
?>
<div class="container telo" id="telo" >
                <form id="priadajPrvok " style="text-align: center">
                    <br>
                    <label>Obrazok: <input type="text" id="obrazok" name="obrazok"></label>
                    <br>
                    <label>Typ piva: <input type="text" id="typPiva" name="typPiva"></label>
                    <br>
                    <label>Nazov piva: <input type="text" id="nazovPiva" name="nazovPiva"></label>
                    <br>
                    <input class='btn btn-success' id='pridaj' name='pridaj' type='button' value='Pridaj' onclick='vytvorPrvok()'>
                    <br>
                </form>

<script src="../ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

