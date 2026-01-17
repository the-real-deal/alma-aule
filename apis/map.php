<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$result = $dbh->getSedi();

$sedi = array();

// 2. Cicla i risultati
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Aggiungi ogni riga all'array
        $sedi[] = $row;
    }
}

// 3. Stampa l'array codificato in JSON
echo json_encode($sedi);
?>