<?php


class PrvokRezervacie
{
    private $id;
    private $meno;
    private $priezvisko;
    private $datum;
    private $pocetOsob;

    public function __construct($id,$meno = null, $priezvisko = null, $datum, $pocetOsob)
    {
        $this->id=$id;
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->datum = $datum;
        $this->pocetOsob = $pocetOsob;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @return mixed
     */
    public function getPocetOsob()
    {
        return $this->pocetOsob;
    }

    /**
     * @return mixed $meno
     */
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @return mixed $priezvisko
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }
}