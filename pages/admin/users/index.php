<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Gestione Utenti";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/admin/{$page_name}/content.php";
    // $page["css"] = [
    //     "/pages/admin/{$page_name}/style.css"
    // ];
    $page["js"] = [
        "/pages/admin/{$page_name}/main.js"
    ];
    $page["container-classes"] = "p-5";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/admin.php";