<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
header('Content-Type: application/json');

$id = intval($_POST['id']);
$aula = intval($_POST['aula']);
$account = $_POST['account'];
$persone = intval($_POST['persone']);
$data = $_POST['data'];

if ($dbh->updateReservation(
    $id, $aula, $account, $persone, $data
)) {
    echo json_encode([
        'success' => true, 
        'message' => 'Prenotazione correttamente modificata!'
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Qualcosa è andato storto :\\'
    ]);
}