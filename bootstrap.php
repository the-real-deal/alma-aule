<?php
$configs = include("config.php");
$session_started = session_start();

$GLOBALS["pathOf"] = fn($path) => $_SERVER['DOCUMENT_ROOT'] . $path;

if (!$session_started) {
    die("Cannot start session!");
}

require $GLOBALS["pathOf"]("/db/database.php");
require $GLOBALS["pathOf"]("/utils/functions.php");

$dbh = new DatabaseHelper(
    $configs["SERVER"], 
    $configs["DB"]["USERNAME"], 
    $configs["DB"]["PASSWORD"], 
    $configs["DB"]["NAME"],
    $configs["DB"]["PORT"]
);