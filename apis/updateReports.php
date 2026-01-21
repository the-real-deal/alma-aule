<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

//Recupero i dati dal json
$json = file_get_contents('php://input');
$data = json_decode($json, true);

try {
    if(isset($data['reports']) && !empty($data['reports'])) {
        header('Content-Type: application/json');
        
        if($dbh->updateReports($data['reports'])) {
            echo json_encode([
                'success' => true,
                'message' => 'Segnalazioni aggiornate con successo'
            ]);
            exit;
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Errore durante aggiornamento'
            ]);
            exit;
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Nessun dato ricevuto'
        ]);
        exit;
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>