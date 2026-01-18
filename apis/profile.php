<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

header('Content-Type: application/json');


try {
    $username = $_SESSION['username'];
    $profileData = $dbh->getProfileData($username);
    
    if($profileData) {
        echo json_encode([
            'success' => true,
            'data' => $profileData
        ]);
        //Da eliminare dopo il test
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Profilo non trovato'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Errore del server: ' . $e->getMessage()
    ]);
}
?>