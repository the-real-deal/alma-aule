<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

header('Content-Type: application/json');

try {
    $result = $dbh->getReservations($_SESSION['username']);
    
    $totalReservations = count($result);
    $futureReservations = 0;

    for ($i = 0; $i < $totalReservations; $i++) {
        if ($result[$i]['isFuture']) {
            $futureReservations++;
        }
    }

    echo json_encode([
        'success' => true,
        'data' => [
            'reservations' => $result,
            'stats' => [
                'total' => $totalReservations,
                'future' => $futureReservations
            ]
        ]
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>