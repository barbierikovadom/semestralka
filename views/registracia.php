<?php
include "../databaza/Databaza.php";
include "../databaza/Pouzivatel.php";
include "headOdhlaseny.php";

if (!isset($_SESSION)) {
    session_start();
}
$db = new Databaza();

if (isset($_POST['registracia'])) {

    $login = $_POST['login'];
    $priezvisko = $_POST['menoAPriezvisko'];
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    $db->kontrolaRegistracie($login, $priezvisko, $email, $heslo);
}

?>
        <div class="mx-auto text-center ">
                <form method="post">
                    <label>Login: <input required name="login" style="margin: 10px" type="text"></label><br>
                    <label>Meno a priezvisko: <input required name="menoAPriezvisko" style="margin: 10px" type="text"></label><br>
                    <label>E-mail: <input required name="email" style="margin: 10px" type="email"></label><br>
                    <label>Heslo: <input required name="heslo" style="margin: 10px" type="password"></label><br>
                    <input type="submit" class="btn btn-success" id="registracia" name="registracia" value="Zaregistruj">
                </form>
        </div>
    </body>
</html>