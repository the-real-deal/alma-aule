<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Prenotazione";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    $page["css"] = [ 
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
        "/components/map/map.css" 
    ];
    $page["js"] = [ 
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js", 
        "/pages/{$page_name}/main.js",
        "/components/map/map.js",
    ];
    require "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";