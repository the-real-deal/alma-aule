<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

header('Content-Type: application/json');

try {
    $username = $_SESSION['username'];
    $profileData = $dbh->getProfileData($username); 
    
    if ($profileData) {
        echo json_encode([
            'success' => true,
            'data' => $profileData
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Profilo non trovato per l\'utente: ' . htmlspecialchars($username)
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>