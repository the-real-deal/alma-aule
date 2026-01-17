<?php

class AuthManager {
    public const SESSION_VALIDITY_SECS = 120;
    private const AUTH_KEY_COOKIE_ATTR = "session_auth_key";

    public static function isUserLoggedIn() {
        if(isset($_COOKIE[self::AUTH_KEY_COOKIE_ATTR])) {
            $current_time = time();
            if($_COOKIE[self::AUTH_KEY_COOKIE_ATTR] !== "") {
                $cookiesAttr = array_keys($_COOKIE[self::AUTH_KEY_COOKIE_ATTR]);
                for
            } else {
                return false;
            }
            // Controlla se esiste il login_time in sessione
            if(isset($_SESSION[self::LOGIN_TIME_SESSION_KEY])) {
                $login_time = $_SESSION[self::LOGIN_TIME_SESSION_KEY];
                
                // Se il tempo corrente è MINORE del tempo di scadenza, l'utente è ancora loggato
                if($current_time < $login_time) {
                    return true;
                } else {
                    // Sessione scaduta - pulisci tutto
                    self::logout();
                }
            }
        }
        return false;
    }

    public static function registerLoggedIn($user) {
        
        // Calcola il tempo di scadenza
        $expiry_time = time() + self::SESSION_VALIDITY_SECS;
        
        // Salva il tempo di scadenza nella sessione
        $_SESSION[self::LOGIN_TIME_SESSION_KEY] = $expiry_time;
        
        // Imposta il cookie con il tempo di scadenza corretto
        setcookie(self::AUTH_KEY_COOKIE_ATTR, $user, $expiry_time, "/");
    }

    public static function logout() {
        // Elimina il cookie
        setcookie(self::AUTH_KEY_COOKIE_ATTR, "", time() - 3600, "/");
        
        // Pulisci la sessione
        unset($_SESSION[self::LOGIN_TIME_SESSION_KEY]);
        unset($_SESSION["username"]);
    }
}