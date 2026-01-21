<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// PHP code (your_php_script.php)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idAula"])) {
    $idAula = $_GET["idAula"];

    $aula = $dbh->getAula($idAula)->fetch_all();
    // Process the received variable here
    echo json_encode([
        'CodiceAula' => $aula[0][0],
        'NomeAula' => $aula[0][1],
        'CodiceSede' => $aula[0][2],
        'NumeroPiano' => $aula[0][3],
        'NumeroPosti' => $aula[0][4],
        'Accessibilita' => $aula[0][5],
        'Proiettore' => $aula[0][6],
        'Prese' => $aula[0][7],
        'Laboratorio' => $aula[0][8],
        'CodiceSede' => $aula[0][9],
        'Indirizzo' => $aula[0][10],
        'Latitudine' =>$aula[0][11],
        'Longitudine' => $aula[0][12]


    ]);
} else {
    echo "No data received";
}
