<?php 
require_once ('config.php');
require_once ('klasy/KredytForm.class.php');
require_once ('klasy/KredytWynik.class.php');
require_once ('klasy/KredytKontroler.class.php');

$ctrl = new KredytKontroler();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
    $ctrl->process();
}

include 'raty_view.php';
?>