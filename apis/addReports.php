<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

try {
    if(isset($data) && !empty($data)) {
        header('Content-Type: application/json');
        $dbh->addReport($data["reservationId"],$data["user"],$data["description"]);
    } 
    echo json_encode("");
    exit;
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>