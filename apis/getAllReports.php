<?php

require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

try {
    $result = $dbh->getAllReports();
    echo json_encode([
        "success" => true,
        'data' => [
            'reports' => $result
        ]
    ]);
} catch (Exception $e) {
    echo json_encode(["success" => false]);
}