<?php
require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

// Gestione richiesta JSON (dal localStorage check)
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if(isset($data['dati']) && !empty($data['dati'])) {
    $datiRicevuti = $data['dati'];
    
    header('Content-Type: application/json');
    
    if(AuthManager::isUserLoggedIn($dbh, $datiRicevuti)) {
        $_SESSION["username"] = $datiRicevuti;
        echo json_encode([
            'success' => true,
            'username' => $datiRicevuti
        ]);
        exit;
    } else {
        echo json_encode([
            'success' => false,
            'username' => ''
        ]);
        exit;
    }
}

// Gestione login da form HTML
$result = [];

if(isset($_POST["submit"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(!empty($login_result)) {
        $result["logineseguito"] = true;
        $username = $login_result[0]["Username"];
        $_SESSION["username"] = $username;

        AuthManager::registerLoggedIn($dbh, $username);
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'username' => $username
        ]);
        exit;
    } else {
        $result["errorelogin"] = "Mail e/o password errati";
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'errore' => $result["errorelogin"]
        ]);
        exit;
    }
}
?>