<?php


class PrvokRezervacie
{
    private $meno;
    private $priezvisko;
    private $datum;
    private $pocetOsob;

    public function __construct($meno = null, $priezvisko = null, $datum, $pocetOsob)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->datum = $datum;
        $this->pocetOsob = $pocetOsob;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum): void
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getPocetOsob()
    {
        return $this->pocetOsob;
    }

    /**
     * @param mixed $pocetOsob
     */
    public function setPocetOsob($pocetOsob): void
    {
        $this->pocetOsob = $pocetOsob;
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