<?php

function isUserLoggedIn() {
    return isset($_SESSION["username"]) && !empty($_SESSION["username"]);
}

function registerLoggedIn($user) {
    $_SESSION["mail"] = $user["Mail"];
    $_SESSION["username"] = $user["Username"];
}