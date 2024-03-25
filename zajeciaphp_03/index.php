<?php require_once ('config.php');
   
    if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true)) {
        header('Location: raty.php');
        exit();
    }
?>

<!DOCTYPE html>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <title>Logowanie</title>
</head>
<body>
    <header id="header"><h2 id="title">Kalkulator rat </h2></header>
    <div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                        <h1 class="major">Logowanie</h1> 
        <form action="system/login.php" method="POST">
            <label for="login">Login:</label><input type="text" name="login" id="login"><br/>
           <label for="password">Hasło:</label> <input type="password" name="pass" id="pass"><br/>
            <input type="submit">
        </form>
    <br/>
    <?php
            if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>
        	</div>
					</section>

			</div>
    <!-- Footer -->
			<footer id="footer" class="wrapper alt">
				<div class="inner">
					<ul class="menu">
						<li>Kalkulator kredytowy 2024 &copy; Sebastian Kałuża</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
	</footer>
</body>
</html>