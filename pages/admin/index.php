<?php 
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Admin Dashboard";
    $page["container-classes"] = "p-5";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    include "{$_SERVER['DOCUMENT_ROOT']}/template/admin.php";
