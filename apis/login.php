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
            'username' => $receivedData,
            'admin' => AuthManager::isAdmin($dbh, $receivedData)
        ]);
        exit;
    } else {
        echo json_encode([
            'username' => $receivedData,
            'admin'=> false
        ]);
        exit;
    }
} else if (isset($_POST["submit"])) {
    header('Content-Type: application/json');
    $login_result = AuthManager::checkLogin($dbh, $_POST["email"], $_POST["password"]);
    if (!empty($login_result)) {
        $username = $login_result[0]["Username"];
        if($login_result[0]['Attivo']===1) {
            $_SESSION["username"] = $username;

            AuthManager::registerLoggedIn($dbh, $username);
            echo json_encode([

                'success' => true,
                'username' => $username,
                'admin'=> AuthManager::isAdmin($dbh, $username)
            ]);
            exit;
        } else {
            echo json_encode([
            'success' => false,
            'username' => '',
            'message' => 'Il tuo account è disabilitato, contatta l\' amministratore'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'username' => '',
            'message' => 'Mail/Password errate!!'
        ]);
        exit;
    }
} else {
    echo json_encode([
        'username' => '',
        'admin' => false
    ]);
    exit;
}
