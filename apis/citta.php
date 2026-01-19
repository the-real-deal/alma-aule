<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
$out = $dbh->getCitta()->fetch_all();
foreach ($out as $s) {
    error_log(print_r($s));
}
echo json_encode($out);
