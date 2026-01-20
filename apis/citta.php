<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/php/citta.php';
$out = $dbh->getCitta()->fetch_all();

$cities=array();
foreach ($out as $c) {
    array_push($cities, new City($c[0],$c[1],$c[2],$c[3]));
}
echo json_encode($cities);
?>