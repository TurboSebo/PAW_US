<?php
    require_once('../config.php');
    
    if (!isset($_POST['login'])||!isset($_POST['pass'])){
        header('Location: ../index.php');
        exit(); 
    }
    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==true){
        header('Location: ../raty.php');
        exit();
    }

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (($login=="user" && $pass=="user")||($login=="admin" && $pass=="admin")){
        $_SESSION['zalogowany'] = true;
        $_SESSION['logged_user'] = $login;
        header('Location: ../raty.php');
        exit();
    }

    else{
        $_SESSION['blad'] = '<span style="color:red"> Nieprawidłowy login lub hasło! </span>';
        header('Location: ../index.php');
    }
?>