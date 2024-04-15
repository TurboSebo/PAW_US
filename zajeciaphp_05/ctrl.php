<?php
require_once ('config.php');
require_once ('klasy/KredytForm.class.php');
require_once ('klasy/KredytWynik.class.php');
require_once ('klasy/KredytKontroler.class.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';

switch ($action) {
    case 'home':
        include 'main.php';
        echo 'domyslne';
        break;
    case 'calculate':
        $ctrl = new KredytKontroler();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
            $ctrl->process();
        }
        
        include 'raty.php';
        break;
    default:

        break;
}
echo 'ctrl.php';
?>

