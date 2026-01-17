<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$result = $dbh->getPrenotazioni($_SESSION['username']);

$prenotazioni = array();
$prenotazioniFuture = 0;
$oggi = date('Y-m-d-H');

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $prenotazione = array(
            'nomeAula' => $row['NomeAula'],
            'numeroPiano' => $row['NumeroPiano'],
            'numeroPosti' => $row['NumeroPosti'],
            'dataPrenotazione' => $row['DataPrenotazione'],
            'numeroPersone' => $row['NumeroPersone'],
            'via' => $row['Via'],
            'isFutura' => $row['DataPrenotazione'] >= $oggi
        );
        
        $prenotazioni[] = $prenotazione;
        
        if ($row['DataPrenotazione'] >= $oggi) {
            $prenotazioniFuture++;
        }
    }
}

$response = array(
    'prenotazioni' => $prenotazioni,
    'statistiche' => array(
        'totalePrenotazioni' => count($prenotazioni),
        'prenotazioniFuture' => $prenotazioniFuture
    )
);

header('Content-Type: application/json');
echo json_encode($response);
?>