<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$result = $dbh->getSites();

$sedi = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sedi[] = $row;
    }
}

echo json_encode($sedi);
?>