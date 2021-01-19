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
     * @return mixed
     */
    public function getNazovPiva()
    {
        return $this->nazovPiva;
    }

    /**
     * @return mixed
     */
    public function getTypPiva()
    {
        return $this->typPiva;
    }

}