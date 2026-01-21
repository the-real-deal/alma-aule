<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

header('Content-Type: application/json');

try {
    $result = $dbh->getReservationsStats($_SESSION['username']);
    if ($result->num_rows > 0) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $totalReservations = count($result);
        $futureReservations = 0;

        for ($i = 0; $i < $totalReservations; $i++) {
            if ($result[$i]['isFuture']) {
                $futureReservations++;
            }
        }

        echo json_encode([
            'success' => true,
            'stats' => [
                    'total' => $totalReservations,
                    'future' => $futureReservations
                ]
        ]);
    
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Non sono presenti prenotazioni per ' . $_SESSION["username"] . ' quindi le statistiche non possono essere calcolate.',
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>