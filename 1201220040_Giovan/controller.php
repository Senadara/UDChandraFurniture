<?php
class userAccount {
    private $iduser;
    private $email;
    private $password;
    private $namauser;
    private $usia;
    
    function __construct($nama) {
        $this->namauser = $nama;
    }
    
    public function menampilkanNama() {
        echo $this->namauser;
    }
    
    public function isiNama($nama) {
        $this->namauser = $nama;
    }
    
    public function menampilkanUsia() {
        echo $this->usia;
    }

    public function tambahUsia($tahun) {
        return $this->usia+$tahun;
    }

    public function kurangUsia($tahun) {
        return $this->usia+$tahun;
    }
    
}

$user = new userAccount('Katak Bhizer', '25');
$user->tambahUsia(10);
$user->kurangUsia(15);
echo $user->menampilkanUsia();
?>