<?php
class Categori
{
    private $idCategori, $namaCategori, $deskripsiCategori;

    public function __construct($idCategori, $namaCategori, $deskripsiCategori)
    {
        $this->idCategori = $idCategori;
        $this->namaCategori = $namaCategori;
        $this->deskripsiCategori = $deskripsiCategori;
    }

    // Getter
    public function getIdCategori()
    {
        return $this->idCategori;
    }

    public function getNamaCategori()
    {
        return $this->namaCategori;
    }

    public function getDeskripsiCategori()
    {
        return $this->deskripsiCategori;
    }

    // Setter
    public function setIdCategori($idCategori)
    {
        $this->idCategori = $idCategori;
    }

    public function setNamaCategori($namaCategori)
    {
        $this->namaCategori = $namaCategori;
    }

    public function setDeskripsiCategori($deskripsiCategori)
    {
        $this->deskripsiCategori = $deskripsiCategori;
    }
}
