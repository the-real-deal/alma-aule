<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// PHP code (your_php_script.php)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idAula"]) && isset($_POST["seats"]) && isset($_POST["date"])) {
    $idAula = $_POST["idAula"];
    $username = $_SESSION["username"];
    $seats =$_POST["seats"];
    $date=$_POST["date"];
    $dbh->addReservation($idAula,$username,$seats,$date);
}
