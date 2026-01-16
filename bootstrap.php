<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/db/database.php";
require $_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php";
$dbh = new DatabaseHelper("localhost", "root", "", "almaule", 3307);
?>