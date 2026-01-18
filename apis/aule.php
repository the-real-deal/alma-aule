<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$data = array();
$sedi = $dbh->getSedi()->fetch_assoc();
foreach ($sedi as $s) {
    $data += [$s => $dbh->getAulePerSede($s["CodiceSede"])->fetch_array()];
}
echo json_encode($data);
