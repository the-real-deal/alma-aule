<?php

require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

try {
    $result = $dbh->getAllReservations();
    echo json_encode($result);
} catch (Exception $ex) {
    echo json_encode([
        "success" => false,
    ]);
}