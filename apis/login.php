<?php
require "bootstrap.php";

<<<<<<< Updated upstream
<<<<<<< Updated upstream
$result["logineseguito"] = false;

if(isset($_POST["submit"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    
    if(!empty($login_result)) {
        $result["logineseguito"] = true;
        registerLoggedIn($login_result[0]);
    } else {
         $result["errorelogin"] = "Mail e/o password errati";
    }
}
=======
=======

>>>>>>> Stashed changes

>>>>>>> Stashed changes

if(isUserLoggedIn()){
    header("Location: home.html");
    exit();
}
?>