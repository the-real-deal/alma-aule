<?php

class AuthManager {
    
    public static function isUserLoggedIn() {
        return isset($_SESSION["username"]) && !empty($_SESSION["username"]);
    }

    public static function registerLoggedIn($user) {
        $_SESSION["mail"] = $user["Mail"];
        $_SESSION["username"] = $user["Username"];
    }
}