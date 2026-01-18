<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "404 Not Found";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    $page["css"] = [ "/pages/{$page_name}/style.css" ];
    $page["js"] = [ "/pages/{$page_name}/main.js" ];
    $page["container-classes"] = "d-flex flex-column justify-content-center align-items-center text-center";
    require "{$_SERVER['DOCUMENT_ROOT']}/template/fullpage.php";