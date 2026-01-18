<?php
$configs = include("config.php");
if(!isset($_SESSION)) {
    session_start();
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