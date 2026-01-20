<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function checkLogin($mail, $password)
    {
        $query = "SELECT Username, Mail FROM account WHERE Attivo=1 AND Mail = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $mail, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSites()
    {
        $query = "SELECT * FROM sedi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getReservations($username)
    {
        $query = "SELECT au.NomeAula, au.NumeroPiano, au.NumeroPosti,p.DataPrenotazione, p.NumeroPersone, s.Via, (DataPrenotazione >= CURRENT_TIMESTAMP()) as isFuture FROM prenotazioni p JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN account a ON p.CodiceAccount = a.Username JOIN sedi s ON au.CodiceSede = s.CodiceSede WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getReservationsStats($username)
    {
        $query = "SELECT p.DataPrenotazione, (p.DataPrenotazione >= CURRENT_TIMESTAMP()) as isFuture FROM prenotazioni p JOIN account a ON p.CodiceAccount = a.Username WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getSiteRooms($sede)
    {
        $query = "SELECT * FROM aule au WHERE au.CodiceSede = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $sede);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getLastSession($username)
    {
        $query = "SELECT ExpirationDate FROM authsessions WHERE CodiceAccount = ? ORDER BY ExpirationDate DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertAuthSession($username, $expiry_time)
    {
        $lastSession = $this->getLastSession($username);
        if (!empty($lastSession)) {
            $query = "UPDATE authsessions SET ExpirationDate = ? WHERE CodiceAccount = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $expiry_time, $username);
        } else {
            $query = "INSERT INTO authsessions (CodiceAccount, ExpirationDate) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $username, $expiry_time);
        }
        $stmt->execute();
    }

    private function isAStudent($username)
    {
        $query = "SELECT p.Matricola, p.Nome, p.Cognome, a.Mail, p.DataNascita FROM account a JOIN studenti p ON a.Username = p.CodiceAccount WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        return $data;
    }

    private function isAProfessor($username)
    {
        $query = "SELECT p.Matricola, p.Nome, p.Cognome, a.Mail, p.DataNascita, p.DataAssunzione FROM account a JOIN professori p ON a.Username = p.CodiceAccount WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        return $data;
    }

    public function getProfileData($username)
    {
        $result = $this->isAStudent($username);

        if (!empty($result)) {
            $result['tipo'] = 'studente';
            return $result;
        }

        $result = $this->isAProfessor($username);

        if (!empty($result)) {
            $result['tipo'] = 'professore';
            return $result;
        }

        return null;
    }

    public function getReports($username) {
        $query = "SELECT au.NomeAula, se.Via, au.NumeroPiano, p.DataPrenotazione, s.Descrizione 
                    FROM segnalazioni s JOIN account a ON s.CodiceAccount = a.Username JOIN prenotazioni p ON s.CodicePrenotazione = p.CodicePrenotazione 
                    JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN sedi se ON au.CodiceSede = se.CodiceSede
                    WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
    public function getCitta()
    {
        $query = "SELECT DISTINCT s.Citta FROM sedi s";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}
