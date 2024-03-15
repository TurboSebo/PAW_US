<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Rat</title>
</head>
<body>
    <h1>Kalkulator rat</h1>
        <form action="raty.php" method="get">
            <label for="kwota_p">Kwota </label><input type="number" id="kwota_p" name="kwota_p"> <br>
            <label for="oprocentowanie_i">Oprocentowanie </label><input type="number" step="0.01" min="0" name="oprocentowanie_i" id="oprocentowanie_i">% <br>
            <label for="lata_n">Lata </label><input type="number"  name="lata_n" id="lata_n"> <br>
            <input type="submit">
        </form>
    <br/>
    <?php if (isset($wynik)) { 
         echo '<strong>wynik</strong><br/>';
         echo 'Wysokość raty wynosi:'.$wynik;
         echo '<br/>';
     } ?>
    <a href="calc.php">Powrót</a>
</body>
</html>
