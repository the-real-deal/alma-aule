<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

// tuo-file.php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if(isset($data['dati'])) {
    $datiRicevuti = $data['dati'];
    if(AuthManager::isUserLoggedIn($dbh, $datiRicevuti)) {
        echo json_encode([
        'success' => true,
        'username' => $datiRicevuti
    ]);
    header('Location: /components/home/');
    exit();
    }
}

$result["logineseguito"] = false;    

if(isset($_POST["submit"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(!empty($login_result)) {
        $result["logineseguito"] = true;
        $_SESSION["username"] = $login_result[0]["Username"];
        AuthManager::registerLoggedIn($dbh,$_SESSION["username"]);
        echo json_encode([
        'success' => true,
        'username' => $datiRicevuti
        ]);
        header('Location: /components/home/');
        exit();
    } else {
        $result["errorelogin"] = "Mail e/o password errati";
    }
}
?>