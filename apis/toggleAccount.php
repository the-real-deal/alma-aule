<?php

require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

// Recupero i dati dal json
$json = file_get_contents('php://input');
$receivedData = json_decode($json, true);

if(!isset($receivedData['username']) || empty($receivedData['username'])) {
    echo json_encode([
        "success" => false,
        "reason" => "Username empty or null!",
    ]);
    exit();
}
$username = $receivedData['username'];
if (!$dbh->toggleAccountState($username)) {
    echo json_encode([
        "success" => false,
        "reason" => "Cannot change " . $username . " status!",
    ]);
    exit();
}

echo json_encode([
    "success" => true,
]);