<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$data = array();
foreach ($dbh->getSedi()->fetch_assoc() as $sede) {
    $data += [$sede => $dbh->getAulePerSede($sede["CodiceSede"])];
}
echo $data;
