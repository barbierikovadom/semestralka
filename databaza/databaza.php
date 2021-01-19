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
        if( $stmt = $this->pripojenie->prepare("INSERT INTO semestralka.pouzivatelia (login, menoAPriezvisko, email, heslo) VALUES (?,?,?, '$hash_heslo')")) {
            $stmt->bind_param("sss", $login, $priezvisko, $email);
            $stmt->execute();

            header("LOCATION: ../views/prihlasenie.php");

            $stmt->close();
        }
    }

    function prihlasenie($login)
    {
        if( $stmt = $this->pripojenie->prepare("SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = ?")) {
            $stmt->bind_param("s", $login);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                echo "<h2> Používateľ nenájdený! </h2>";
            }
            $stmt->close();
            return $result;
        }
        return null;
    }

    function zmenaHesla($login, $heslo){
        $hashHeslo = password_hash($heslo, PASSWORD_DEFAULT);
        if( $stmt = $this->pripojenie->prepare("UPDATE semestralka.pouzivatelia SET heslo = '$hashHeslo' WHERE login = ?")) {
            $stmt->bind_param("s", $login);
            $stmt->execute();

            header("LOCATION: ../views/prihlasenie.php");

            $stmt->close();
        }
    }

    function odstranenieUctu($login){
        if($login != 'admin') {
            $id = $this->najdiPouzivatela($login);
            if ($stmt = $this->pripojenie->prepare("DELETE FROM semestralka.rezervacia WHERE semestralka.rezervacia.idPouzivatela = ?")) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                if ($stmt1 = $this->pripojenie->prepare("DELETE FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = ?")) {
                    $stmt1->bind_param("s", $login);
                    $stmt1->execute();
                    $stmt1->close();
                    return true;
                }
            }
        } else {
            echo "<h2> Tento účet nie je možné odstrániť </h2>";
        }
        return false;
    }


    function nacitanieMenu(){
        $stmt = $this->pripojenie->query("SELECT * FROM semestralka.menu");
        $prvky=[];
        while ($row = $stmt->fetch_assoc()) {
            $prvok = new PrvokMenu($row['id'],$row['typPiva'], $row['obrazok'], $row['nazovPiva']);
            $prvky[] = $prvok;
        }
        return $prvky;
    }

    function kontrolaRegistracie($login, $priezvisko, $email, $heslo){

        if( $stmt = $this->pripojenie->prepare("SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = ?") ) {
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($stmt1 = $this->pripojenie->prepare("SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.email = ?")) {
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $result1 = $stmt1->get_result();

                if ($result->num_rows === 0 && $result1->num_rows === 0)  {
                    $this->registracia($login, $priezvisko, $email, $heslo);
                    $stmt1->close();
                } else {
                    echo  "<h2> Užívateľ s daným loginom alebo emailom už existuje </h2>";
                }
            }
            $stmt->close();
        }
    }

    function nacitajRezervacie($login){
        $prvky = [];
        if($login == 'admin'){
            $stmt = $this->pripojenie->query("SELECT rezervacia.id, login, menoAPriezvisko, datum, pocetOsob FROM semestralka.pouzivatelia JOIN semestralka.rezervacia
            ON semestralka.rezervacia.idPouzivatela = semestralka.pouzivatelia.idPouzivatela ");
            while ($riadok = $stmt->fetch_assoc()) {
                $prvok = new PrvokRezervacie($riadok['id'],$riadok['login'], $riadok['menoAPriezvisko'], $riadok['datum'], $riadok['pocetOsob']);
                $prvky[] = $prvok;
            }
        } else {
            $id = $this->najdiPouzivatela($login);
            if ($id != null) {
                if( $stmt = $this->pripojenie->prepare("SELECT rezervacia.id, datum, pocetOsob FROM semestralka.rezervacia WHERE semestralka.rezervacia.idPouzivatela = ?")) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $prvok = new PrvokRezervacie($row['id'],null, null, $row['datum'], $row['pocetOsob']);
                        $prvky[] = $prvok;
                    }
                    $stmt->close();
                }
            }
        }
        return $prvky;
    }

    function vymazRezervaciu($vymazanyPrvok){
        if( $stmt = $this->pripojenie->prepare("DELETE from semestralka.rezervacia WHERE  id = ?")) {
            $stmt->bind_param("i", $vymazanyPrvok);
            $stmt->execute();
            $stmt->close();
        }
    }

    function vytvorenieRezervacie($idPouzivatela, $datum, $pocetOsob){
        if( $stmt = $this->pripojenie->prepare("INSERT INTO semestralka.rezervacia (idPouzivatela, datum, pocetOsob) VALUES (?,?,?)")) {
            $stmt->bind_param("sss", $idPouzivatela, $datum, $pocetOsob);
            $stmt->execute();
            $stmt->close();
        }
    }

    function vymazPrvokMenu($vymazanyPrvok){
        if( $stmt = $this->pripojenie->prepare("DELETE from semestralka.menu WHERE  id = ?")) {
            $stmt->bind_param("i", $vymazanyPrvok);
            $stmt->execute();
            $stmt->close();
        }
    }

    function pridajPrvokMenu($obrazok, $typPiva, $nazovPiva){
       if( $stmt = $this->pripojenie->prepare("INSERT INTO semestralka.menu (obrazok, typPiva, nazovPiva) VALUES (?,?,?)")) {
           $stmt->bind_param("sss", $obrazok, $typPiva, $nazovPiva);
           $stmt->execute();
           $stmt->close();
       }
    }

    function najdiPouzivatela($login){
        if( $stmt = $this->pripojenie->prepare("SELECT idPouzivatela FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = ?")) {
            $stmt->bind_param("s", $login);
            $stmt->execute();

            $result = $stmt->get_result();

            $id = null;
            while ($row = $result->fetch_assoc()) {
                $id = $row['idPouzivatela'];
            }

            $stmt->close();
            return $id;
        }
        return null;
    }

    function nacitajPouzivatela($login){
            if ($stmt = $this->pripojenie->prepare("SELECT * FROM semestralka.pouzivatelia WHERE semestralka.pouzivatelia.login = ?")) {
                $stmt->bind_param("s", $login);
                $stmt->execute();

                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $pouzivatel = new Pouzivatel($row['login'], $row['menoAPriezvisko'], $row['email'], $row['heslo']);
                }
                $stmt->close();
                return $pouzivatel;
            }
            return null;
        }

    function nacitajVsetkychPouzivatelov(){
        $pouzivatelia = [];
            $stmt = $this->pripojenie->query("SELECT * FROM semestralka.pouzivatelia");
            while ($riadok = $stmt->fetch_assoc()) {
                $pouzivatel = new Pouzivatel($riadok['login'], $riadok['menoAPriezvisko'], $riadok['email'], $riadok['heslo']);
                $pouzivatelia[] = $pouzivatel;
            }
        return $pouzivatelia;
    }
}