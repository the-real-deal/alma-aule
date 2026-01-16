<?php

function isUserLoggedIn(){
    return !empty($_SESSION['username']);
}

function registerLoggedIn($user){
    $_SESSION["mail"] = $user["Mail"];
    $_SESSION["username"] = $user["Username"];
}
?>