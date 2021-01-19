<?php


class Pouzivatel
{
    private $krsneMeno;
    private $priezvisko;
    private $email;
    private $heslo;

    public function __construct($krsneMeno, $priezvisko, $email, $heslo)
    {
        $this->krsneMeno = $krsneMeno;
        $this->priezvisko = $priezvisko;
        $this->email = $email;
        $this->heslo = $heslo;
    }

    /**
     * @return mixed
     */
    public function getKrsneMeno()
    {
        return $this->krsneMeno;
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