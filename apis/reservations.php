<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

header('Content-Type: application/json');

try {
    $result = $dbh->getReservations($_SESSION['username']);
    if ($result->num_rows > 0) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode([
            'success' => true,
            'reservations' => $result,
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Non sono presenti prenotazioni per ' . $_SESSION["username"],
        ]);
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>