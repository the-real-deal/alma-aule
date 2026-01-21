<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

header('Content-Type: application/json');

try {
    $username = $_SESSION['username'];
    $profileData = $dbh->getProfileData($username); 
    
    echo json_encode([
        'success' => true,
        'data' => $profileData
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Errore: ' . $e->getMessage()
    ]);
}
?>