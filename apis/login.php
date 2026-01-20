<?php
require_once "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";

//Recupero i dati dal json
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if(isset($data['dati']) && !empty($data['dati'])) {
    $receivedData = $data['dati'];
    header('Content-Type: application/json');
    
    if(AuthManager::isUserLoggedIn($dbh, $receivedData)) {
        $_SESSION["username"] = $receivedData;
        echo json_encode([
            'success' => true,
            'username' => $receivedData
        ]);
        exit;
    } else {
        echo json_encode([
            'success' => false,
            'username' => ''
        ]);
        exit;
    }
} else if (isset($_POST["submit"])) {
    $login_result = AuthManager::checkLogin($dbh, $_POST["email"], $_POST["password"]);
    if (!empty($login_result)) {
        $result["logineseguito"] = true;
        $username = $login_result;
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
} else {
    echo json_encode([
        'success' => false,
        'username' => ''
    ]);
    exit;
}
