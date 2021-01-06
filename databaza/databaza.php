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

    function registracia($login, $priezvisko, $email, $heslo)
    {
        $hash_heslo = password_hash($heslo, PASSWORD_DEFAULT);
        $sql = "INSERT INTO semestralka.pouzivatelia (login, menoAPriezvisko, email, heslo) VALUES ('$login','$priezvisko', '$email', '$hash_heslo')";
        if ($this->pripojenie->query($sql) === TRUE) {
            header("LOCATION: ../views/prihlasenie.php");
        } else {
            echo "Chyba: " . $sql . "<br>" . $this->pripojenie->error;
        }
    }

    function prihlasenie($login)
    {
        $sql = "SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = '$login'";
        $vysledok = $this->pripojenie->query($sql);
        if ($vysledok->num_rows === 0) {
            echo "Pouzivatel nenajdeny!";
        }
        return $vysledok;
    }

    function zmenaHesla($login, $heslo){
        $hashHeslo = password_hash($heslo, PASSWORD_DEFAULT);
        $sql = "UPDATE semestralka.pouzivatelia SET heslo = '$hashHeslo' WHERE login = '$login'";
        if ($this->pripojenie->query($sql) === TRUE) {
            header("LOCATION: ../views/prihlasenie.php");
        }
    }

    function odstranenieUctu($login){
            $sql = "DELETE FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = '$login'";
            if ($this->pripojenie->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
    }


    function nacitanieMenu(){
        $stmt = $this->pripojenie->query("SELECT * FROM semestralka.menu");
        $prvky=[];
        while ($row = $stmt->fetch_assoc()) {
            $prvok = new PrvokMenu($row['typPiva'], $row['obrazok'], $row['nazovPiva']);
            $prvky[] = $prvok;
        }
        return $prvky;
    }

    function kontrolaRegistracie($login, $priezvisko, $email, $heslo){
        $sql = "SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = '$login'";
        $sql2 = "SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.email = '$email'";
        $vysledok = $this->pripojenie->query($sql);
        $vysledok2 = $this->pripojenie->query($sql2);
        if ($vysledok->num_rows === 0 && $vysledok2->num_rows === 0) {
            $this->registracia($login, $priezvisko, $email, $heslo);
        } else {
            echo "Uzivatel s danym menom uz existuje";
        }
    }

    function nacitajRezervacie($login){
        $prvky = [];
        if($login == 'admin'){
            $stmt = $this->pripojenie->query("SELECT login, menoAPriezvisko, datum, pocetOsob FROM semestralka.pouzivatelia JOIN semestralka.rezervacia
            ON semestralka.rezervacia.idPouzivatela = semestralka.pouzivatelia.id ");
            while ($riadok = $stmt->fetch_assoc()) {
                $prvok = new PrvokRezervacie($riadok['login'], $riadok['menoAPriezvisko'], $riadok['datum'], $riadok['pocetOsob']);
                $prvky[] = $prvok;
            }
        } else {
            $id = $this->najdiPouzivatela($login);

            if ($id != null) {
                $stmt = $this->pripojenie->query("SELECT datum, pocetOsob FROM semestralka.rezervacia WHERE semestralka.rezervacia.idPouzivatela = ' $id '");
                while ($riadok = $stmt->fetch_assoc()) {
                    $prvok = new PrvokRezervacie(null, null, $riadok['datum'], $riadok['pocetOsob']);
                    $prvky[] = $prvok;
                }
            }
        }
        return $prvky;
    }

    function vytvorenieRezervacie($idPouzivatela, $datum, $pocetOsob){
        $sql = "INSERT INTO semestralka.rezervacia (idPouzivatela, datum, pocetOsob) VALUES ('$idPouzivatela','$datum', '$pocetOsob')";
        $this->pripojenie->query($sql);
    }

    function najdiPouzivatela($login){
        $sql = $this->pripojenie->query("SELECT id FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = '$login'");
        $id = null;
        while ($row = $sql->fetch_assoc()) {
            $id = $row['id'];
        }
        return $id;
    }
}