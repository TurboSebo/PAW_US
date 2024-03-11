<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Rat</title>
</head>

<body>
    <h1>Kalkulator rat</h1>
        <form action="" method="get">
            <label for="kwota_p">Kwota </label><input type="number" id="kwota_p" name="kwota_p"> <br>
            <label for="oprocentowanie_i">Oprocentowanie </label><input type="number" step="0.01" min="0" name="oprocentowanie_i" id="oprocentowanie_i">% <br>
            <label for="lata_n">Lata </label><input type="number"  name="lata_n" id="lata_n"> <br>
            <input type="submit">
        </form>
    <br/>
    

    <?php
   if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {

            $kwota = isset($_GET['kwota_p']) && $_GET['kwota_p'] !== '' ? $_GET['kwota_p'] : null;
            $oprocentowanie = isset($_GET['oprocentowanie_i']) && $_GET['oprocentowanie_i'] !== '' ? $_GET['oprocentowanie_i'] : null;
            $lata = isset($_GET['lata_n']) && $_GET['lata_n'] !== '' ? $_GET['lata_n'] : null;
            if ($kwota!==null && $lata!==null && $oprocentowanie!==null){
            echo "Oprocentowanie to $oprocentowanie"."% a kwota to $kwota i to na $lata lat".'<br/>';
                if (!is_numeric($kwota) || !is_numeric($oprocentowanie) || !is_numeric($lata))  {
                echo 'Pola muszą zawierać liczby <br/>';
                }
                else{
                    $miesiace = $lata * 12;
                    $oprocentowanie_miesieczne = ($oprocentowanie / 100) / 12;

                    $wynik = ($kwota * $oprocentowanie_miesieczne) / (1 - pow((1 + $oprocentowanie_miesieczne), -$miesiace));
                    $wynik = round($wynik, 2);

                    echo '<strong>wynik</strong><br/>';
                    echo 'Wysokość raty wynosi:'.$wynik;
                    echo '<br/>';
                }
            }
            else{
                echo'Pola nie mogą być puste <br/>';
            }
            
        }
    ?>

    <a href="calc.php">Powrót</a>
</body>
</html>
