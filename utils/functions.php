<?php

function isUserLoggedIn() {
    return isset($_SESSION["username"]) and $_SESSION["username"] != "";
}

function registerLoggedIn($user) {
    $_SESSION["mail"] = $user["Mail"];
    $_SESSION["username"] = $user["Username"];
}
?>