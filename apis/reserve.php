<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// PHP code (your_php_script.php)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idAula"])) {
    $idAula = $_POST["idAula"];
    $username = $_SESSION["username"];
}
