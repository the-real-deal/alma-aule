<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

header('Content-Type: application/json');

try {
    $result = $dbh->getReports($_SESSION['username']);
    
    echo json_encode([
        'success' => true,
        'data' => [
            'reports' => $result,
            'username' => $_SESSION['username']
        ]
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>