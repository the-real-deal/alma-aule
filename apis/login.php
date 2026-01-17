<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";


if(AuthManager::isUserLoggedIn()) {
    header("Location: /components/home");
    exit();
}

$result["logineseguito"] = false;    

if(isset($_POST["submit"])) {

    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(!empty($login_result)) {
        $result["logineseguito"] = true;
        $_SESSION["username"] = $login_result[0]["Username"];
        AuthManager::registerLoggedIn($_SESSION["username"]);
    } else {
        $result["errorelogin"] = "Mail e/o password errati";
    }
}
