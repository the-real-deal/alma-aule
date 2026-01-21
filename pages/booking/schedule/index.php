<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
$page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
$page["title"] = "Prenotazione";
$page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/booking/{$page_name}/content.php";
$page["css"] = [];
$page["js"] = [
    "/pages/booking/{$page_name}/main.js",
];
require "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";
