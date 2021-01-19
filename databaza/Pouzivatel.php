<?php


class Pouzivatel
{
    private $login;
    private $priezvisko;
    private $email;
    private $heslo;

    public function __construct($login, $priezvisko, $email, $heslo)
    {
        $this->login = $login;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
        $this->heslo = $heslo;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}