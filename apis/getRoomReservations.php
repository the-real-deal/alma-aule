<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// PHP code (your_php_script.php)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idAula"]) && isset($_GET["day"]) ) {
    $idAula = $_GET["idAula"];
    $day=$_GET["day"];
    
    $prenotazioni = $dbh->getAulaReservations($idAula,$day)->fetch_all(MYSQLI_ASSOC);
    // Process the received variable here

    echo json_encode($prenotazioni);
} else {
    echo "No data received";
}