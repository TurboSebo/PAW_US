<?php
namespace klasy;

class Logowanie {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($login, $pass) {
        if (($login == "user" && $pass == "user") || ($login == "admin" && $pass == "admin")) {
            $_SESSION['zalogowany'] = true;
            $_SESSION['logged_user'] = $login;
            return true;
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            return false;
        }
    }


}
?>
