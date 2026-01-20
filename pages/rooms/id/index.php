<?php 
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Dettaglio aula";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/rooms/{$page_name}/content.php";
    $page["container-classes"] = "d-flex flex-column align-items-center justify-content-center";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";