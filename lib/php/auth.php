<?php

class AuthManager {
    public const SESSION_VALIDITY_SECS = 10*24*60*60;
    private const AUTH_KEY_COOKIE_ATTR = "session_auth_key";

    public static function isAdmin($dbh, $username) { 
        return $dbh->isAdmin($username);
    }

    public static function checkLogin($dbh, $mail, $password) {
        $login_result = $dbh->checkLogin($mail, $password);
        if(!empty($login_result)) {
            if($login_result[0]['Username']) {
                return $login_result[0]["Username"];
            }
            return $login_result[0]["Username"];
        }
        return $login_result;
    }

    public static function isUserLoggedIn($dbh, $username) {
        $result = $dbh->getLastSession($username);
        if(!empty($result[0])) {
            $current_time = strtotime((new DateTime())->format('Y-m-d H:i:s'));
            if($current_time < strtotime($result[0]['ExpirationDate'])) {
                return true;
            } 
        }
        return false;
    }

    public static function registerLoggedIn($dbh, $user) {
        // Calcola il tempo di scadenza
        $expiry_time = (new DateTime())->add(new DateInterval('PT' . self::SESSION_VALIDITY_SECS . 'S'));
        $expiry_str = $expiry_time->format('Y-m-d H:i:s');
        $dbh->insertAuthSession($user, $expiry_str);
        // Imposta il cookie con il tempo di scadenza corretto
        setcookie(self::AUTH_KEY_COOKIE_ATTR, $user, $expiry_time->getTimestamp(), "/");
    }
}