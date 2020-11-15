<?php
class databaza
{
    private $pripojenie;

    public function __construct()
    {
        $this->pripojenie = new mysqli("localhost", "root", "dtb456", "semestralka");
        if ($this->pripojenie->connect_error) {
            die("Pripojenie zlyhalo: " . $this->pripojenie->connect_error);
        }

    }

    function registracia($meno, $priezvisko, $email, $heslo)
    {
        $hash_heslo = password_hash($heslo, PASSWORD_DEFAULT);
        $sql = "INSERT INTO semestralka.pouzivatelia (krsneMeno, priezvisko, email, heslo) VALUES ('$meno','$priezvisko', '$email', '$hash_heslo')";
        if ($this->pripojenie->query($sql) === TRUE) {
            header("LOCATION: ../views/prihlasenie.php");
        } else {
            echo "Chyba: " . $sql . "<br>" . $this->pripojenie->error;
        }
    }

    function prihlasenie($meno)
    {
        $sql = "SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.krsneMeno = '$meno'";
        $vysledok = $this->pripojenie->query($sql);
        if ($vysledok->num_rows === 0) {
            echo "Pouzivatel nenajdeny!";
        }
        return $vysledok;
    }

    function zmenaHesla($meno, $heslo){
        $hashHeslo = password_hash($heslo, PASSWORD_DEFAULT);
        $sql = "UPDATE semestralka.pouzivatelia SET heslo = '$hashHeslo' WHERE krsneMeno = '$meno'";
        $this->pripojenie->query($sql);
    }

    function odstranenieUctu($meno){
        $sql = "DELETE FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.krsneMeno = '$meno'";
        if($this->pripojenie->query($sql) === TRUE){
            return true;
        } else {
            return false;
        }
    }
}