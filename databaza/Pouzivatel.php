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
     * @param mixed $krsneMeno
     */
    public function setKrsneMeno($krsneMeno): void
    {
        $this->krsneMeno = $krsneMeno;
    }

    /**
     * @return mixed
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    /**
     * @param mixed $priezvisko
     */
    public function setPriezvisko($priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getHeslo()
    {
        return $this->heslo;
    }

    /**
     * @param mixed $heslo
     */
    public function setHeslo($heslo): void
    {
        $this->heslo = $heslo;
    }


}