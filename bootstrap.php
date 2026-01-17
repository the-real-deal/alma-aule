<?php
$configs = include("config.php");
$session_started = session_start();

if (!$session_started) {
    die("Cannot start session!");
}

require "{$_SERVER['DOCUMENT_ROOT']}/db/database.php";
require "{$_SERVER['DOCUMENT_ROOT']}/lib/auth.php";

$dbh = new DatabaseHelper(
    $configs["SERVER"], 
    $configs["DB"]["USERNAME"], 
    $configs["DB"]["PASSWORD"], 
    $configs["DB"]["NAME"],
    $configs["DB"]["PORT"]
    );