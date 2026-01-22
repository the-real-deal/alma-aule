<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Gestione Segnalazioni";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/admin/{$page_name}/content.php";
    $page["css"] = [
        "/pages/admin/{$page_name}/style.css"
    ];
    $page["js"] = [
        "/components/reportsManager/reportsManager.js"
    ];
    $page["container-classes"] = "p-5 overflow-x-hidden";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/admin.php";