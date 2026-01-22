<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

$json = file_get_contents('php://input');

$data = json_decode($json, true);

$id = $data['id'] ?? null;

try {
    header('Content-Type: application/json');
    if($id) {
        if($dbh->updateReports($id)) {
            echo json_encode(['success' => true, 'message' => 'Successo']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Errore DB']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Nessun dato ricevuto']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}