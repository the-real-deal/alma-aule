<?php
session_start();
$_SESSION['username'] = "";
$_SESSION['mail'] = "";
require $_SERVER['DOCUMENT_ROOT'] . "/db/database.php";
require $_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php";
$dbh = new DatabaseHelper("localhost", "root", "", "almaule", 3307);
?>