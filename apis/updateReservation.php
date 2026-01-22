<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
header('Content-Type: application/json');

// Get POST data
$id = intval($_POST['id']);
$aula = intval($_POST['aula']);
$account = $_POST['account'];
$persone = intval($_POST['persone']);
$data = $_POST['data'];

$dbh->updateReservation(
    $id, $aula, $account, $persone, $data
);