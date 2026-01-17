<?php

class AuthManager {
    public const SESSION_VALIDITY_SECS = 120;
    private const AUTH_KEY_COOKIE_ATTR = "session_auth_key";

    public static function isUserLoggedIn($dbh, $username) {
        $result = $dbh->getLastSession($username);
        if(isset($result)) {
            $current_time = new DateTime();
            if($current_time < $result[0]['ExpirationDate']) {
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