<?php 
require_once dirname(__FILE__) .'/../config.php';

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

                   
                }
            }
            else{
                echo'Pola nie mogą być puste <br/>';
            }
            
        }
        include 'raty_view.php';
    ?>


