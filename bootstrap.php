<?php

$configs = include("config.php");
if(!isset($_SESSION)) {
    session_start();
}

require "{$_SERVER['DOCUMENT_ROOT']}/lib/php/auth.php";
require "{$_SERVER['DOCUMENT_ROOT']}/lib/php/fileutils.php";
require "{$_SERVER['DOCUMENT_ROOT']}/db/database.php";

if (isset($dbh)) {
    return;
}

$dbh = new DatabaseHelper(
    $configs["SERVER"], 
    $configs["DB"]["USERNAME"], 
    $configs["DB"]["PASSWORD"], 
    $configs["DB"]["NAME"],
    $configs["DB"]["PORT"]
);