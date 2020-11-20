<?php
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

<html>
<title>Kontakt</title>

<div class="otvaHodiny">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <br>
                <h1>
                    Otváracie hodiny:
                </h1>
                <br>
                <p class="text-center">
                    PO : 9.00 - 22.00  <br>
                    UT : 9.00 - 22.00 <br>
                    ST : 9.00 - 22.00  <br>
                    ŠTV : 9.00 - 22.00 <br>
                    PIA : 9.00 - 00.00  <br>
                    SO : 9.00 - 23.00 <br>
                    NE : 9.00 - 22.00  <br>
                </p>
            </div>

            <div class="col-6 ">
                <br>
                <br>
                 <img class="d-block w-100 rounded mx-auto d-block" src="../images/obrazkyKontakt/budova.jpg" alt="budova podniku">
            </div>
        </div>
        <br>
        <br>
    </div>

</div>

</body>
</html>