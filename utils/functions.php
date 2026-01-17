<?php

function isUserLoggedIn() {
    return isset($_SESSION["username"]) && !empty($_SESSION["username"]);
}

function registerLoggedIn($user) {
    $_SESSION["mail"] = $user["Mail"];
    $_SESSION["username"] = $user["Username"];
}

/**
 * Prepend a file/resource path with `$_SERVER['DOCUMENT_ROOT']`.
 * @param string $path the file/resource to include
 * @return string
 */
function pathOf($path) {
    return $_SERVER['DOCUMENT_ROOT'] . $path;
}