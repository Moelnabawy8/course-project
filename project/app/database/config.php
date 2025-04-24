<?php
class Config {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $databasename = 'course';
    private $con;

    public function __construct() {
        $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);

        // تأكد إن الاتصال ناجح
        // if ($this->con->connect_error) {
        //     die("Connection failed: " . $this->con->connect_error);
        // }
    }

    // Run DML: insert, update, delete => بيرجع true أو false
    public function runDML(string $query): bool {
        $result = $this->con->query($query);
        return $result ? true : false;
    }

    // Run DQL: select => بيرجع array
    public function runDQL(string $query) {
        $result = $this->con->query($query);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
