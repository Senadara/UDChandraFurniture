<?php
class User{
    private $username;
    private $password;
    private $confirm;
    public function __construct() { 
        $arguments = func_get_args(); 
        $numberOfArguments = func_num_args(); 
  
        if (method_exists($this, $function =  'ConstructFor'.$numberOfArguments)) { 
            call_user_func_array(array($this, $function), $arguments); 
        } 
    } 
    public function ConstructForLogin($nama, $password){
        $this->username = $nama;
        $this->password = $password;
    }
    public function ConstructForRegister($nama, $password, $confirmPassword){
        $this->username = $nama;
        $this->password = $password;
        $this->confirm = $confirmPassword;
    }
    public function getName() {
        return $this->username;
    }
    public function setName($set) {
        $this->username = $set;
    }
    public function getPassword() {
        return $this->password;
    }
}

?>