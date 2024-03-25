<?php  
require_once ('config.php');
if(!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
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
    <title>Kalkulator Rat</title>
    <link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body>
<header id="header"><h2 id="title">Kalkulator rat </h2></header>
    <div id="wrapper">
				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
                        <h1 class="major">Strona główna</h1> 
        
        <section>
            
             <form action="raty.php" method="get">
                <div class="row gtr-uniform">
                    <div class="col-6 col-12-xsmall">
                        <label for="kwota_p">Kwota </label><input type="text" id="kwota_p" name="kwota_p">
                    </div>
                    <br/>
                    <div class="col-6 col-12-xsmall">
                        <label for="oprocentowanie_i">Oprocentowanie (%)</label><input type="text" step="0.01" min="0" name="oprocentowanie_i" id="oprocentowanie_i">
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <label for="lata_n">Lata </label><input type="text"  name="lata_n" id="lata_n"> 
                    </div>
                    <div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="oblicz" class="primary" /></li>
							<li><input type="reset" value="wyczyść" /></li>
						</ul>
					</div>
                </div>
            </form>
        </section>
    <br/>
    <?php 
    if (isset($blad)) echo '<p>'.$blad.'</p>';
    if (isset($wynik)) { 
         echo '<strong>wynik</strong><br/>';
         echo 'Wysokość raty wynosi: '.$wynik;
         echo '<br/>';
     } ?>
    <br/>
    <br/>
    <a href="system/wyloguj.php">Wyloguj</a>
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