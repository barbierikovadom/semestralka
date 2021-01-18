<?php
include '../databaza/databaza.php';
include '../databaza/PrvokMenu.php';
$databaza = new Databaza();


if (!isset($_SESSION)) {
    session_start();
}

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
<div class="piva">
    <div class="container telo" id="telo">
        <div class="row">
            <div class="col-12">
                <br>
                <h1 class="text-center">
                    Čapujeme:
                </h1>
            </div>
        </div>
        <?php foreach ($databaza->nacitanieMenu() as $prvok) { ?>
            <div class="row">
                <img src="<?php echo $prvok->getObrazok() ?>" alt="..." class="obrazok rounded mx-auto d-block img-fluid">
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">
                        <?php
                            echo $prvok->getNazovPiva()
                        ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center">
                        <?php
                            echo $prvok->getTypPiva()
                        ?>
                    </p>
                </div>
            </div>
        <?php }?>
    </div>
</div>
</body>
</html>
