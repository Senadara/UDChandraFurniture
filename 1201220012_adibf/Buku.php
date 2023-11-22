<?php
class Buku
{
    private $idBuku, $judulBuku, $pengarang, $categori, $deskripsi, $stok, $statusBuku;

    function __construct($idBuku, $judulBuku, $pengarang, $categori, $deskripsi, $stok, $statusBuku)
    {
        $this->idBuku = $idBuku;
        $this->judulBuku = $judulBuku;
        $this->pengarang = $pengarang;
        $this->categori = $categori;
        $this->deskripsi = $deskripsi;
        $this->stok = $stok;
        $this->statusBuku = $statusBuku;
    }

    // getter
    public function getIdBuku()
    {
        return $this->idBuku;
    }

    public function getJudulBuku()
    {
        return $this->judulBuku;
    }

    public function getPengarang()
    {
        return $this->pengarang;
    }

    public function getCategori()
    {
        return $this->categori;
    }

    public function getDeskripsi()
    {
        return $this->deskripsi;
    }
    public function getStok()
    {
        return $this->stok;
    }
    public function getStatusBuku()
    {
        return $this->statusBuku;
    }

    // Setter
    public function setIdBuku($idBuku)
    {
        $this->idBuku = $idBuku;
    }

    public function setJudulBuku($judulBuku)
    {
        $this->judulBuku = $judulBuku;
    }

    public function setPengarang($pengarang)
    {
        $this->pengarang = $pengarang;
    }

    public function setCategori($categori)
    {
        $this->categori = $categori;
    }

    public function setDeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }

    public function setStok($stok)
    {
        $this->stok = $stok;
    }

    public function setStatusBuku($statusBuku)
    {
        $this->statusBuku = $statusBuku;
    }

    public function tampilData()
    {
        echo "ID Buku: " . $this->idBuku . "<br>";
        echo "Judul Buku: " . $this->judulBuku . "<br>";
        echo "Pengarang: " . $this->pengarang . "<br>";
        echo "Kategori: " . $this->categori . "<br>";
        echo "Deskripsi: " . $this->deskripsi . "<br>";
        echo "Stok: " . $this->stok . "<br>";
        echo "Status Buku: " . $this->statusBuku . "<br>";
        echo "--------------------------<br>";
    }
}
