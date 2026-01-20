<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/php/citta.php';
$out = $dbh->getCitta()->fetch_all();

$cities = array();
foreach ($out as $c) {
    $tmp = new City($c[0], $c[1], $c[2], $c[3]);
    array_push($cities, $tmp);
}
echo json_encode($cities);
