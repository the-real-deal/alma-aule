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
        $query = "SELECT Username, Attivo FROM account WHERE Mail = ? AND Password = ?";
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
        $query = "SELECT p.CodicePrenotazione, au.NomeAula, au.NumeroPiano, au.NumeroPosti,p.DataPrenotazione, p.NumeroPersone, s.Via, (DataPrenotazione >= CURRENT_TIMESTAMP()) as isFuture FROM prenotazioni p JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN account a ON p.CodiceAccount = a.Username JOIN sedi s ON au.CodiceSede = s.CodiceSede WHERE a.Username = ? ORDER BY p.DataPrenotazione ASC";
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
        $query = "SELECT ExpirationDate FROM authsessions at JOIN account a ON at.CodiceAccount = a.Username WHERE at.CodiceAccount = ? AND a.Attivo = 1 ORDER BY ExpirationDate DESC LIMIT 1";
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

    public function getReports($username)
    {
        $query = "SELECT s.CodiceSegnalazione, au.NomeAula, se.Via, au.NumeroPiano, p.DataPrenotazione, s.Descrizione, s.Stato 
                    FROM segnalazioni s JOIN account a ON s.CodiceAccount = a.Username JOIN prenotazioni p ON s.CodicePrenotazione = p.CodicePrenotazione 
                    JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN sedi se ON au.CodiceSede = se.CodiceSede
                    WHERE a.Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
    public function getCitta(): bool|mysqli_result
    {
        $query = "SELECT * FROM citta";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function getAllUsers(): bool|mysqli_result
    {
        $query = "SELECT 
                    a.Username, 
                    t.Tipo AS Ruolo, 
                    a.Attivo, 
                    a.Mail,
                    COALESCE(s.Nome, p.Nome) AS Nome,
                    COALESCE(s.Cognome, p.Cognome) AS Cognome,
                    COALESCE(s.DataNascita, p.DataNascita) AS DataNascita,
                    s.Matricola AS MatricolaStudente,
                    p.Matricola AS MatricolaProfessore,
                    p.Ordinario,
                    p.DataAssunzione
              FROM account a 
              INNER JOIN tipi_account t ON a.codiceRuolo = t.ID
              LEFT JOIN studenti s ON a.Username = s.CodiceAccount
              LEFT JOIN professori p ON a.Username = p.CodiceAccount";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function toggleAccountState($username)
    {
        $query = "UPDATE account SET Attivo = NOT Attivo WHERE Username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    public function updateReports($id)
    {
        try {
            $query = "UPDATE segnalazioni SET Stato = NOT Stato WHERE CodiceSegnalazione = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            return $stmt->affected_rows > 0;
        } catch (Exception $e) {
            return false;
        }
    }

    public function isAdmin($username)
    {
        $query = "SELECT Username FROM account WHERE Username = ? AND codiceRuolo = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return isset($result[0]['Username']);
    }

    public function getAula($id)
    {
        $query = "SELECT * FROM aule au JOIN sedi s ON au.CodiceSede=s.CodiceSede WHERE au.CodiceAula=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function addReport($reportId, $user, $description)
    {
        $query = "INSERT INTO segnalazioni (CodicePrenotazione,CodiceAccount,Descrizione) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iss", $reportId, $user, $description);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getAulaReservations($idAula, $date)
    {
        $query = "SELECT * FROM prenotazioni p WHERE p.CodiceAula=? AND date(p.DataPrenotazione) = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $idAula, $date);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function addReservation($idAula, $username, $nPersone, $date)
    {
        $query = "INSERT INTO `prenotazioni` (`CodicePrenotazione`, `CodiceAula`, `CodiceAccount`, `NumeroPersone`, `DataPrenotazione`) VALUES (null, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("isis", $idAula, $username, $nPersone, $date);
        $stmt->execute();
    }

    public function isActive($user)
    {
        $query = "SELECT * FROM account WHERE Username = ? AND Attivo = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getAllReports()
    {
        $query = "SELECT s.CodiceSegnalazione, au.NomeAula, se.Via, au.NumeroPiano, p.DataPrenotazione, s.Descrizione, s.Stato 
                    FROM segnalazioni s JOIN account a ON s.CodiceAccount = a.Username JOIN prenotazioni p ON s.CodicePrenotazione = p.CodicePrenotazione 
                    JOIN aule au ON p.CodiceAula = au.CodiceAula JOIN sedi se ON au.CodiceSede = se.CodiceSede ORDER BY p.DataPrenotazione DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllReservations()
    {
        $sql = "SELECT p.CodicePrenotazione, p.CodiceAula, p.CodiceAccount, 
               p.NumeroPersone, p.DataPrenotazione, a.NomeAula
        FROM prenotazioni p
        LEFT JOIN aule a ON p.CodiceAula = a.CodiceAula
        ORDER BY p.DataPrenotazione DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function updateReservation(int $id, int $aula, string $account, int $persone, string $data)
    {
        $dataFormatted = date('Y-m-d H:i:s', strtotime($data));

        $checkRoom = $this->db->prepare("SELECT CodiceAula FROM aule WHERE CodiceAula = ?");
        $checkRoom->bind_param("i", $aula);
        $checkRoom->execute();
        if ($checkRoom->get_result()->num_rows === 0) {
            return false;
        }
        $checkRoom->close();

        $checkAccount = $this->db->prepare("SELECT Username FROM account WHERE Username = ?");
        $checkAccount->bind_param("s", $account);
        $checkAccount->execute();
        if ($checkAccount->get_result()->num_rows === 0) {
            return false;
        }
        $checkAccount->close();

        $checkConflict = $this->db->prepare("SELECT CodicePrenotazione FROM prenotazioni 
                                 WHERE CodiceAula = ? AND DataPrenotazione = ? 
                                 AND CodicePrenotazione != ?");
        $checkConflict->bind_param("isi", $aula, $dataFormatted, $id);
        $checkConflict->execute();
        if ($checkConflict->get_result()->num_rows > 0) {
            return false;
        }
        $checkConflict->close();

        $stmt = $this->db->prepare("UPDATE prenotazioni 
                        SET CodiceAula = ?, CodiceAccount = ?, 
                            NumeroPersone = ?, DataPrenotazione = ? 
                        WHERE CodicePrenotazione = ?");
        $stmt->bind_param("isisi", $aula, $account, $persone, $dataFormatted, $id);

        return $stmt->execute();
    }

    public function deleteReservation(int $id)
    {
        // Check if reservation exists
        $checkReservation = $this->db->prepare("SELECT CodicePrenotazione FROM prenotazioni WHERE CodicePrenotazione = ?");
        $checkReservation->bind_param("i", $id);
        $checkReservation->execute();
        if ($checkReservation->get_result()->num_rows === 0) {
            echo json_encode(['success' => false, 'message' => 'Prenotazione non trovata']);
            $checkReservation->close();
            $this->db->close();
            exit;
        }
        $checkReservation->close();

        // Check if there are related reports (segnalazioni)
        $checkReports = $this->db->prepare("SELECT COUNT(*) as count FROM segnalazioni WHERE CodicePrenotazione = ?");
        $checkReports->bind_param("i", $id);
        $checkReports->execute();
        $result = $checkReports->get_result();
        $row = $result->fetch_assoc();
        $reportCount = $row['count'];
        $checkReports->close();

        // If there are reports, delete them first (or you can choose to prevent deletion)
        if ($reportCount > 0) {
            $deleteReports = $this->db->prepare("DELETE FROM segnalazioni WHERE CodicePrenotazione = ?");
            $deleteReports->bind_param("i", $id);
            $deleteReports->execute();
            $deleteReports->close();
        }

        // Delete reservation
        $stmt = $this->db->prepare("DELETE FROM prenotazioni WHERE CodicePrenotazione = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                return true;
            }
        }
        return false;
    }
}

