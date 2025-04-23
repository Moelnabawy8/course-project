<?php

class Config{
    private $hostname = 'localhost';  
    private $username = 'root';
    private $password = '';
    private $databasename = 'course';
    private $con;
public function __construct() {
    $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);
    // if ($con->connect_error) {
    //     die("Connection failed: " . $con->connect_error);
    // }
    // echo "Connected successfully";
}
 public function runDML(string $query) : bool
 {
$result = $this->con->query($query);
if ($result) {
    return true;
} else {
    return false;
 }
}
 public function runDQL(string $query) :array
 {
    $result = $this->con->query($query);
    if ($result) { 
        return $result->fetch_all(MYSQLI_ASSOC);
    } 
        return [];
    }

 }


//$database = new Config();
// $database->connect();