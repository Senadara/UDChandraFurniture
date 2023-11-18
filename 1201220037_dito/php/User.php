<?php
class User
{
    private $name;
    private $username;
    private $Gmail;
    private $phone;
    private $password;
    private $confirm;

    public function __construct($name, $username, $Gmail, $phone, $password, $confirm)
    {
        $this->name = $name;
        $this->username = $username;
        $this->Gmail = $Gmail;
        $this->phone = $phone;
        $this->password = $password;
        $this->confirm = $confirm;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
