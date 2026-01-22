<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" 
    && isset($_POST["idAula"]) 
    && isset($_POST["seats"]) 
    && isset($_POST["accessibility"])
    && isset($_POST["projector"])
    && isset($_POST["lab"])
    && isset($_POST["plugs"])) {

    $idAula = $_POST["idAula"];
    $seats =$_POST["seats"];
    $accessibility=$_POST["accessibility"];
    $projector=$_POST["projector"];
    $lab=$_POST["lab"];
    $plugs=$_POST["plugs"];
    

    // Log degli errori
    error_log("=== POST DATA RECEIVED ===");
    error_log("idAula: " . ($idAula !== null ? $idAula : "NOT SET"));
    error_log("seats: " . ($seats !== null ? $seats : "NOT SET"));
    error_log("accessibility: " . ($accessibility !== null ? $accessibility : "NOT SET"));
    error_log("projector: " . ($projector !== null ? $projector : "NOT SET"));
    error_log("lab: " . ($lab !== null ? $lab : "NOT SET"));
    error_log("plugs: " . ($plugs !== null ? $plugs : "NOT SET"));
    error_log("=========================");

    // Oppure tutto il POST in una volta
    error_log("Full POST data: " . print_r($_POST, true));

    $dbh->updateRoom($seats,$projector,$plugs,$accessibility,$lab,$idAula);
}