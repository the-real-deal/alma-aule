<?php
    require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
    $page_name = FileUtils::getFolderName($_SERVER['PHP_SELF']);
    $page["title"] = "Home";
    $page["content"] = "{$_SERVER['DOCUMENT_ROOT']}/pages/{$page_name}/content.php";
    $page["css"] = [ 
        "/pages/{$page_name}/style.css",
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
        "/components/map/map.css", 
    ];
    $page["js"]= [ 
        "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js",
        "/components/map/map.js", 
        "/components/reservations/reservations.js",
        "/pages/{$page_name}/main.js",
    ];
    require "{$_SERVER['DOCUMENT_ROOT']}/template/base.php";