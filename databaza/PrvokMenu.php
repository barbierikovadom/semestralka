<?php


class PrvokMenu
{
    private $id;
    private $obrazok;
    private $nazovPiva;
    private $typPiva;

    public function __construct($id, $typPiva, $obrazok, $nazovPiva)
    {
        $this->id = $id;
        $this->typPiva = $typPiva;
        $this->obrazok = $obrazok;
        $this->nazovPiva = $nazovPiva;
    }

    /**
     * @return mixed
     */
    public function getObrazok()
    {
        return $this->obrazok;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @param mixed $obrazok
     */
    public function setObrazok($obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    /**
     * @return mixed
     */
    public function getNazovPiva()
    {
        return $this->nazovPiva;
    }

    /**
     * @param mixed $nazovPiva
     */
    public function setNazovPiva($nazovPiva): void
    {
        $this->nazovPiva = $nazovPiva;
    }

    /**
     * @return mixed
     */
    public function getTypPiva()
    {
        return $this->typPiva;
    }

    /**
     * @param mixed $typPiva
     */
    public function setTypPiva($typPiva): void
    {
        $this->typPiva = $typPiva;
    }


}