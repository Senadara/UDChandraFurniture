<?php
    class User{
        private $username;
        private $email;
        private $password;
        private $confirm_pass;

        public function __construct ($username,$email,$password,$confirm_pass){
            $this->username=$username;
            $this->email=$email;
            $this->password=$password;
            $this->confirm_pass=$confirm_pass;
        }

        public function getUsername(){
            return $this->username;
        }
        public function setUsername($username){
            $this->username=$username;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email=$email;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password=$password;
        }

        public function getConfirmPass(){
            return $this->confirm_pass;
        }
        public function setConfirmPass($confirm_pass){
            $this->confirm_pass=$confirm_pass;
        }
    }
?>