<?php


class MenuDB{
    private $nazovPiva;
    private $obrazok;
    private $typPiva;

    public function __construct($nazovPiva, $obrazok, $typPiva){
        $this->nazovPiva = $nazovPiva;
        $this->obrazok = $obrazok;
        $this->typPiva = $typPiva;
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
    public function setNazovPiva($nazovPiva)
    {
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
     * @param mixed $obrazok
     */
    public function setObrazok($obrazok)
    {
        $this->obrazok = $obrazok;
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
    public function setTypPiva($typPiva)
    {
        $this->typPiva = $typPiva;
    }

    public function loadAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM articles");
        $articles=[];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['title'], $row['text']);
            $articles[] = $article;
        }
        return $articles;
    }

}