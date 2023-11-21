<?php
class Connection{
    private $hostname = "localhost";
    private $user = "root";
    private $password = "root";
    private $dbName = "db_news_lumen";

    public function connect(){
        return new mysqli($this->hostname, $this->user, $this->password, $this->dbName);
    }
}
?>