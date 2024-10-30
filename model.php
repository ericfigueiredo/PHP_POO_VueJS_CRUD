<?php
Class Model{
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db = 'php-poo-vuejs-crud';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection error " . $e->getMessage();
        }
    }

    public function insert($nome, $email){
        $query = "INSERT INTO users(`nome`,`email`) VALUES('$nome', '$email')";
        if ($sql = $this->conn->query($query)) {
            return true;
        }else {
            return;
        }
    }
}
?>