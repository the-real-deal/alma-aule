<?php
class DatabaseHelper    { 
    private $db;

    public function __construct($servername,$username,$password,$dbname,$port) {
        $this->db = new mysqli($servername,$username,$password,$dbname,$port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    }

    public function checkLogin($mail, $password) {
        $query = "SELECT Username, Mail FROM account WHERE Attivo=1 AND Mail = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$mail, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}