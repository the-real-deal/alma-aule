<?php
    require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    $page["container-classes"] = "d-flex flex-column justify-content-center align-items-center text-center text-white p-5 my-5";
    $page["css"] = [ "/pages/{$page_name}/style.css" ];
    $page["js"] = [ "/lib/js/animatedBackground.js" ];
    require "{$_SERVER['DOCUMENT_ROOT']}/template/fullpage.php";