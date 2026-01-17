<?php
class DatabaseHelper    { 
    private $db;

    public function __construct($servername,$username,$password,$dbname,$port) {
        $this->db = new mysqli($servername,$username,$password,$dbname,$port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
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

    public function getSedi() {
        $query = "SELECT Via, Latitudine, Longitudine FROM sedi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getPrenotazioni($username) {
        $query = "SELECT au.NomeAula, au.NumeroPiano, au.NumeroPosti,p.DataPrenotazione, p.NumeroPersone, s.Via FROM prenotazioni p JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN account a ON p.CodiceAccount = a.Username JOIN sedi s ON au.CodiceSede = s.CodiceSede WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}