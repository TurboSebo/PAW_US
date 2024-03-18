<?php require_once ('config.php');
   
    if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true)) {
        header('Location: raty.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h1>Kalkulator rat - logowanie</h1>
        <form action="system/login.php" method="POST">
            <label for="login">Login:</label><input type="text" name="login" id="login"><br/>
           <label for="password">Hasło:</label> <input type="password" name="pass" id="pass"><br/>
            <input type="submit">
        </form>
    <br/>
    <?php
            if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>
</body>
</html>