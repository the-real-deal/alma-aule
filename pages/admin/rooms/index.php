<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Gestione Aule";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/admin/{$page_name}/content.php";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/admin.php";