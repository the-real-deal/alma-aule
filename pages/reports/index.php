<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Profilo utente";
    $page["js"] = [
        "/pages/{$page_name}/main.js"
    ];
    $page["container-classes"] = "container mt-4";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";