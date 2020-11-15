<?php
include "../databaza/Databaza.php";
include "../databaza/Pouzivatel.php";
include "index.php";

session_start();
$db = new Databaza();

if (isset($_POST['registracia'])) {

    $meno = $_POST['meno'];
    $priezvisko = $_POST['priezvisko'];
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    $db->registracia($meno, $priezvisko, $email, $heslo);
}

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="UTF-8">
    </head>

    <div class="container h-100">
        <div class="mx-auto text-center ">
            <form method="post">
                <div>
                    <label for="meno" class="col-sm-2 col-form-label">Meno</label>
                    <input type="text" id="meno" name="meno">
                </div>
                <div>
                    <label for="priezvisko" class="col-sm-2 col-form-label">Priezvisko</label>
                    <input type="text" id="priezvisko" name="priezvisko">
                </div>
                <div>
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <input type="text" id="email" name="email">
                </div>
                <div>
                    <label for="heslo" class="col-sm-2 col-form-label">Heslo</label>
                    <input type="text" id="heslo" name="heslo">
                </div>

                <div>
                    <input type="submit" class="btn btn-success" id="registracia" name="registracia" value="Zaregistruj">
                </div>
            </form>
        </div>

    </div>

    </html>
