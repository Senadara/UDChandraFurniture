<?php
class User{
   public $nama;
   public $username;
   public $email;
   public $password;
   public $gender;

   public function __construct($nama, $username, $email, $password, $gender){
       $this->nama = $nama;
       $this->username = $username;
       $this->email = $email;
       $this->password = $password;
       $this->gender = $gender;
   }
}

$usr = new User('Hipo00', 'Hipo', 'Hipoo.@gmail.com', '123456', 'Perempuan');
echo "<pre>";
var_dump($usr);
echo "</pre>";

if ($_SERVER["loginn.html"] == "POST") {
    $nama = $_POST['txtnama'] ?? '';
    $username = $_POST['txtusername'] ?? '';
    $email = $_POST['txtemail'] ?? '';
    $password = $_POST['txtpassword'] ?? '';
    $gender = $_POST['gender'] ?? '';

   echo "<pre>";
   var_dump($usr);
   echo "</pre>";
}
?>
