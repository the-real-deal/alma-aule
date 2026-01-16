<?php
session_start();
require "db/database.php";
require "utils/functions.php";
$dbh = new DatabaseHelper("localhost", "root", "", "almaule",3307);
?>