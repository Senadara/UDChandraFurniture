<?php
class Peminjaman
{
    private $idPeminjaman, $idBuku, $idUser, $namaPeminjam, $noHP, $tanggalPinjam, $tanggalKembali, $statusPeminjaman;

    public function __construct($idPeminjaman, $idBuku, $idUser, $namaPeminjam, $noHP, $tanggalPinjam, $tanggalKembali, $statusPeminjaman)
    {
        $this->idPeminjaman = $idPeminjaman;
        $this->idBuku = $idBuku;
        $this->idUser = $idUser;
        $this->namaPeminjam = $namaPeminjam;
        $this->noHP = $noHP;
        $this->tanggalPinjam = $tanggalPinjam;
        $this->tanggalKembali = $tanggalKembali;
        $this->statusPeminjaman = $statusPeminjaman;
    }

    // Getter
    public function getIdPeminjaman()
    {
        return $this->idPeminjaman;
    }

    public function getIdBuku()
    {
        return $this->idBuku;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getNamaPeminjam()
    {
        return $this->namaPeminjam;
    }

    public function getNoHP()
    {
        return $this->noHP;
    }

    public function getTanggalPinjam()
    {
        return $this->tanggalPinjam;
    }

    public function getTanggalKembali()
    {
        return $this->tanggalKembali;
    }

    public function getStatusPeminjaman()
    {
        return $this->statusPeminjaman;
    }

    // Setter
    public function setIdPeminjaman($idPeminjaman)
    {
        $this->idPeminjaman = $idPeminjaman;
    }

    public function setIdBuku($idBuku)
    {
        $this->idBuku = $idBuku;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setNamaPeminjam($namaPeminjam)
    {
        $this->namaPeminjam = $namaPeminjam;
    }

    public function setNoHP($noHP)
    {
        $this->noHP = $noHP;
    }

    public function setTanggalPinjam($tanggalPinjam)
    {
        $this->tanggalPinjam = $tanggalPinjam;
    }

    public function setTanggalKembali($tanggalKembali)
    {
        $this->tanggalKembali = $tanggalKembali;
    }

    public function setStatusPeminjaman($statusPeminjaman)
    {
        $this->statusPeminjaman = $statusPeminjaman;
    }
}
